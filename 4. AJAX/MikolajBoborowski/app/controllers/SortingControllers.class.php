<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class SortingControllers {
    public function action_sorting() {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        // Pobieranie parametrów filtrowania
        $filter = [
            'type' => $_GET['type'] ?? '',
            'category' => $_GET['category'] ?? '',
            'sort' => $_GET['sort'] ?? 'data_transakcji_desc'
        ];

        // Budowanie warunków filtrowania
        $conditions = ['uzytkownik_id' => $userId];
        if (!empty($filter['type'])) {
            $conditions['typ'] = $filter['type'];
        }
        if (!empty($filter['category'])) {
            $conditions['kategoria[~]'] = $filter['category'];
        }

        // Liczenie rekordów do paginacji
        $total_records = App::getDB()->count("transakcje", $conditions);
        $records_per_page = 10;
        $total_pages = ceil($total_records / $records_per_page);
        $current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $offset = ($current_page - 1) * $records_per_page;

        // Sortowanie 
        $order = ['data_transakcji' => 'DESC'];
        if ($filter['sort'] == 'data_transakcji_asc') {
            $order = ['data_transakcji' => 'ASC'];
        } elseif ($filter['sort'] == 'kwota_desc') {
            $order = ['kwota' => 'DESC'];
        } elseif ($filter['sort'] == 'kwota_asc') {
            $order = ['kwota' => 'ASC'];
        }

        // Pobranie przefiltrowanych, posortowanych transakcji ze stronicowaniem
        $transactions = App::getDB()->select('transakcje', '*', [
            'AND' => $conditions,
            'ORDER' => $order,
            'LIMIT' => [$offset, $records_per_page]
        ]);

        // Przekazanie danych do widoku
        App::getSmarty()->assign('transactions', $transactions);
        App::getSmarty()->assign('filter', $filter);
        App::getSmarty()->assign('current_page', $current_page);
        App::getSmarty()->assign('total_pages', $total_pages);
        App::getSmarty()->display('sorting.tpl');
    }
}
