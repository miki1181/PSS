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

        // Obsługa formularza dodawania transakcji 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = floatval($_POST['amount'] ?? 0);
            $type = $_POST['type'] ?? '';
            $category = $_POST['category'] ?? '';
            $description = $_POST['description'] ?? '';
            $date = $_POST['date'] ?? date('Y-m-d');

            if ($amount <= 0) {
                App::getMessages()->addMessage(new Message("Kwota musi być większa od 0.", Message::ERROR));
            } elseif (empty($type) || ($type !== 'przychód' && $type !== 'wydatek')) {
                App::getMessages()->addMessage(new Message("Nieprawidłowy typ transakcji.", Message::ERROR));
            } else {
                App::getDB()->insert('transakcje', [
                    'uzytkownik_id' => $userId,
                    'kwota' => $amount,
                    'typ' => $type,
                    'kategoria' => $category,
                    'opis' => $description,
                    'data_transakcji' => $date,
                    'data_utworzenia' => date('Y-m-d H:i:s'),
                ]);
                App::getMessages()->addMessage(new Message("Transakcja została dodana.", Message::INFO));
            }
        }

        // Stronicowanie
        $records_per_page = 10;
        $current_page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
        $offset = ($current_page - 1) * $records_per_page;

        // Pobranie liczby rekordów dla paginacji
        $total_records = App::getDB()->count('transakcje', ['uzytkownik_id' => $userId]);
        $total_pages = ceil($total_records / $records_per_page);

        // Pobranie transakcji użytkownika z uwzględnieniem stronicowania
        $transactions = App::getDB()->select('transakcje', '*', [
            'uzytkownik_id' => $userId,
            'ORDER' => ['data_transakcji' => 'DESC'],
            'LIMIT' => [$offset, $records_per_page]
        ]);

        // Przekazanie danych do widoku
        App::getSmarty()->assign('transactions', $transactions);
        App::getSmarty()->assign('current_page', $current_page);
        App::getSmarty()->assign('total_pages', $total_pages);

        App::getSmarty()->display('transactions.tpl');
    }

    // Metoda usuwania 
    public function action_deleteTransaction() {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        $transactionId = intval($_POST['transaction_id'] ?? 0);

        $transaction = App::getDB()->get('transakcje', '*', [
            'id' => $transactionId,
            'uzytkownik_id' => $userId
        ]);

        if ($transaction) {
            App::getDB()->delete('transakcje', ['id' => $transactionId]);
            App::getMessages()->addMessage(new Message("Transakcja została usunięta.", Message::INFO));
        } else {
            App::getMessages()->addMessage(new Message("Transakcja nie istnieje.", Message::ERROR));
        }

        App::getRouter()->redirectTo('transactions');
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
        App::getMessages()->addMessage(new Message("Nieprawidłowy identyfikator transakcji.", Message::ERROR));
        App::getRouter()->redirectTo('transactions');
        return;
    }
        // Pobranie transakcji do edycji
        $transaction = App::getDB()->get('transakcje', '*', [
            'id' => $transactionId,
            'uzytkownik_id' => $userId
        ]);

        if (!$transaction) {
            App::getMessages()->addMessage(new Message("Nie znaleziono transakcji do edycji.", Message::ERROR));
            App::getRouter()->redirectTo('transactions');
            return;
        }

        // Obsługa formularza
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = floatval($_POST['amount'] ?? 0);
            $type = $_POST['type'] ?? '';
            $category = trim($_POST['category'] ?? '');
            $description = $_POST['description'] ?? '';
            $date = $_POST['date'] ?? date('Y-m-d');

            // Walidacja danych
            if ($amount <= 0) {
                App::getMessages()->addMessage(new Message("Kwota musi być większa od 0.", Message::ERROR));
            } elseif (empty($type) || ($type !== 'przychód' && $type !== 'wydatek')) {
                App::getMessages()->addMessage(new Message("Nieprawidłowy typ transakcji.", Message::ERROR));
            } elseif (empty($category)) {
                App::getMessages()->addMessage(new Message("Kategoria jest wymagana.", Message::ERROR));
            } else {
                // Aktualizacja transakcji
                App::getDB()->update('transakcje', [
                    'kwota' => $amount,
                    'typ' => $type,
                    'kategoria' => $category,
                    'opis' => $description,
                    'data_transakcji' => $date,
                    'data_modyfikacji' => date('Y-m-d H:i:s')
                ], [
                    'id' => $transactionId,
                    'uzytkownik_id' => $userId
                ]);

                App::getMessages()->addMessage(new Message("Transakcja została zaktualizowana.", Message::INFO));
                App::getRouter()->redirectTo('transactions');
            }
        }

        // Przekazanie danych do widoku
        App::getSmarty()->assign('transaction', $transaction);
        App::getSmarty()->display('edit_transaction.tpl');
    }
}

