<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * Kontroler do sortowania transakcji
 */
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
            $conditions['kategoria[~]'] = $filter['category']; // Wyszukiwanie częściowe
        }

        // Sortowanie
        $order = ['data_transakcji' => 'DESC'];
        if ($filter['sort'] == 'data_transakcji_asc') {
            $order = ['data_transakcji' => 'ASC'];
        } elseif ($filter['sort'] == 'kwota_desc') {
            $order = ['kwota' => 'DESC'];
        } elseif ($filter['sort'] == 'kwota_asc') {
            $order = ['kwota' => 'ASC'];
        }

        // Pobranie przefiltrowanych i posortowanych transakcji
        $transactions = App::getDB()->select('transakcje', '*', [
            'AND' => $conditions,
            'ORDER' => $order
        ]);

        // Przekazanie danych do widoku
        App::getSmarty()->assign('transactions', $transactions);
        App::getSmarty()->assign('filter', $filter);
        App::getSmarty()->display('sorting.tpl');
    }
}
