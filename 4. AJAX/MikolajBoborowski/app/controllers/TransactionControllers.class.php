<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * Kontroler obsługujący transakcje 
 */
class TransactionControllers {

    
    public function action_transactions() {
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->insertTransaction($userId);
            App::getRouter()->redirectTo('transactions');
            return;
        }

        
        $this->loadFullList($userId);
    }

    
    public function action_addTransactionPart() {
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) return;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->insertTransaction($userId);
        }
       
        $this->action_transactionsPart();
    }

    
    public function action_transactionsPart() {
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) return;

        // Paginacja
        $records_per_page = 10;
        $current_page = max(1, intval($_POST['page'] ?? ($_GET['page'] ?? 1)));
        $offset = ($current_page - 1) * $records_per_page;

        $total_records = App::getDB()->count('transakcje', [
            'uzytkownik_id' => $userId
        ]);
        $total_pages = ceil($total_records / $records_per_page);

        $transactions = App::getDB()->select('transakcje', '*', [
            'uzytkownik_id' => $userId,
            'ORDER'         => ['data_transakcji' => 'DESC'],
            'LIMIT'         => [$offset, $records_per_page]
        ]);

        App::getSmarty()->assign('transactions',  $transactions);
        App::getSmarty()->assign('current_page',  $current_page);
        App::getSmarty()->assign('total_pages',   $total_pages);
        App::getSmarty()->display('transactionsTable.tpl');
    }

   
    public function action_deleteTransaction() {
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) return;

        $transactionId = intval($_POST['transaction_id'] ?? 0);

        $exists = App::getDB()->get('transakcje', '*', [
            'id'            => $transactionId,
            'uzytkownik_id' => $userId
        ]);

        if ($exists) {
            App::getDB()->delete('transakcje', ['id' => $transactionId]);
            App::getMessages()->addMessage(new Message("Transakcja została usunięta.", Message::INFO));
        } else {
            App::getMessages()->addMessage(new Message("Transakcja nie istnieje.", Message::ERROR));
        }

        
        $this->action_transactionsPart();
    }

  
    public function action_editTransaction() {
        $userId = $_SESSION['user']['id'] ?? null;
        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        $transactionId = intval($_GET['id'] ?? 0);
        if (!$transactionId) {
            App::getMessages()->addMessage(new Message("Nieprawidłowy identyfikator.", Message::ERROR));
            App::getRouter()->redirectTo('transactions');
            return;
        }

        $transaction = App::getDB()->get('transakcje', '*', [
            'id'            => $transactionId,
            'uzytkownik_id' => $userId
        ]);
        if (!$transaction) {
            App::getMessages()->addMessage(new Message("Nie znaleziono transakcji.", Message::ERROR));
            App::getRouter()->redirectTo('transactions');
            return;
        }

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            App::getDB()->update('transakcje', [
                'kwota'             => floatval($_POST['amount'] ?? 0),
                'typ'               => $_POST['type'] ?? '',
                'kategoria'         => $_POST['category'] ?? '',
                'opis'              => $_POST['description'] ?? '',
                'data_transakcji'   => $_POST['date'] ?? date('Y-m-d'),
                'data_modyfikacji'  => date('Y-m-d H:i:s')
            ], [
                'id'            => $transactionId,
                'uzytkownik_id' => $userId
            ]);
            App::getMessages()->addMessage(new Message("Transakcja została zaktualizowana.", Message::INFO));
            App::getRouter()->redirectTo('transactions');
            return;
        }

        App::getSmarty()->assign('transaction', $transaction);
        App::getSmarty()->display('edit_transaction.tpl');
    }

    
    private function insertTransaction(int $userId) {
        $amount      = floatval($_POST['amount'] ?? 0);
        $type        = $_POST['type'] ?? '';
        $category    = $_POST['category'] ?? '';
        $description = $_POST['description'] ?? '';
        $date        = $_POST['date'] ?? date('Y-m-d');

        App::getDB()->insert('transakcje', [
            'kwota'             => $amount,
            'typ'               => $type,
            'kategoria'         => $category,
            'opis'              => $description,
            'data_transakcji'   => $date,
            'uzytkownik_id'     => $userId
        ]);
        App::getMessages()->addMessage(new Message("Transakcja została dodana.", Message::INFO));
    }

    
    private function loadFullList(int $userId) {
        $records_per_page = 10;
        $current_page     = max(1, intval($_GET['page'] ?? 1));
        $offset           = ($current_page - 1) * $records_per_page;

        $total_records = App::getDB()->count('transakcje', [
            'uzytkownik_id' => $userId
        ]);
        $total_pages = ceil($total_records / $records_per_page);

        $transactions = App::getDB()->select('transakcje', '*', [
            'uzytkownik_id' => $userId,
            'ORDER'         => ['data_transakcji' => 'DESC'],
            'LIMIT'         => [$offset, $records_per_page]
        ]);

        App::getSmarty()->assign('transactions',  $transactions);
        App::getSmarty()->assign('current_page',  $current_page);
        App::getSmarty()->assign('total_pages',   $total_pages);
        App::getSmarty()->display('transactions.tpl');
    }
}
