<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;


class HelloCtrl {
    
      public function action_hello() {
        $userId = $_SESSION['user']['id'] ?? null;
        $userRoleId = $_SESSION['user']['role_id'] ?? null;

        // Jeśli użytkownik nie jest zalogowany, ustaw puste dane
        $recentTransactions = [];

        // Pobierz ostatnie transakcje tylko dla zalogowanego użytkownika, który nie jest adminem
        if ($userId && $userRoleId != 1) {
            $recentTransactions = App::getDB()->select('transakcje', [
                'data_transakcji', 'kategoria', 'kwota', 'typ'
            ], [
                'uzytkownik_id' => $userId,
                'ORDER' => ['data_transakcji' => 'DESC'],
                'LIMIT' => 3
            ]);
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('recent_transactions', $recentTransactions);
        App::getSmarty()->display('hello.tpl');
    }
}
    

