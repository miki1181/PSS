<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

/**
 * Kontroler do obsługi celów oszczędnościowych
 */
class GoalsController {
    public function action_goals() {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        // Obsługa dodawania celu
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goal_name'])) {
            $goalName = $_POST['goal_name'] ?? '';
            $targetAmount = floatval($_POST['target_amount'] ?? 0);
            $deadline = $_POST['deadline'] ?? null;

            if (empty($goalName)) {
                App::getMessages()->addMessage(new Message("Nazwa celu jest wymagana.", Message::ERROR));
            } elseif ($targetAmount <= 0) {
                App::getMessages()->addMessage(new Message("Kwota docelowa musi być większa od 0.", Message::ERROR));
            } else {
                App::getDB()->insert('cele_oszczednosciowe', [
                    'uzytkownik_id' => $userId,
                    'nazwa_celu' => $goalName,
                    'kwota_docelowa' => $targetAmount,
                    'aktualna_kwota' => 0.00,
                    'termin' => $deadline,
                     'data_utworzenia' => date('Y-m-d H:i:s'),
                ]);
                App::getMessages()->addMessage(new Message("Cel został dodany.", Message::INFO));
            }
        }

        // Obsługa wpłaty do celu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goal_id'])) {
    $goalId = intval($_POST['goal_id']);
    $amount = floatval($_POST['amount']);

    if ($amount <= 0) {
        App::getMessages()->addMessage(new Message("Kwota wpłaty musi być większa od 0.", Message::ERROR));
    } else {
        try {
            // Pobierz aktualne dane celu
            $goal = App::getDB()->get('cele_oszczednosciowe', ['aktualna_kwota', 'kwota_docelowa'], [
                'id' => $goalId,
                'uzytkownik_id' => $userId
            ]);

            if (!$goal) {
                App::getMessages()->addMessage(new Message("Cel nie istnieje lub brak dostępu.", Message::ERROR));
            } elseif ($goal['aktualna_kwota'] + $amount > $goal['kwota_docelowa']) {
                App::getMessages()->addMessage(new Message("Wpłata przekroczy kwotę docelową.", Message::ERROR));
            } else {
                // Aktualizacja kwoty w tabeli
                $newAmount = $goal['aktualna_kwota'] + $amount;
                App::getDB()->update('cele_oszczednosciowe', [
                    'aktualna_kwota' => $newAmount
                ], [
                    'id' => $goalId,
                    'uzytkownik_id' => $userId
                ]);

                // Sprawdź, czy cel został osiągnięty
                if ($newAmount >= $goal['kwota_docelowa']) {
                    App::getMessages()->addMessage(new Message("Gratulacje! Cel został osiągnięty i usunięty.", Message::INFO));
                    
                    // Usuń cel z bazy danych
                    App::getDB()->delete('cele_oszczednosciowe', [
                        'id' => $goalId,
                        'uzytkownik_id' => $userId
                    ]);
                } else {
                    App::getMessages()->addMessage(new Message("Kwota została dodana do celu.", Message::INFO));
                }
            }
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message("Błąd bazy danych: " . $e->getMessage(), Message::ERROR));
        }
    }
}


        // Pobranie istniejących celów użytkownika
        $goals = App::getDB()->select('cele_oszczednosciowe', '*', [
            'uzytkownik_id' => $userId
        ]);

        // Przekazanie danych do widoku
        App::getSmarty()->assign('goals', $goals);
        App::getSmarty()->display('goals.tpl');
    }
}
