<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class AdminController {
    public function action_adminPanel() {
        // Sprawdzenie uprawnień
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('home');
            return;
        }

        // Sprawdzenie, czy użytkownik ma rolę admina
        $roleId = App::getDB()->get('role_uzytkownikow', 'rola_id', ['uzytkownik_id' => $userId]);
        if ($roleId != 1) {
            App::getMessages()->addMessage(new Message("Brak dostępu. Tylko administratorzy mają dostęp do tego panelu.", Message::ERROR));
            App::getRouter()->redirectTo('home');
            return;
        }

        // Obsługa formularza usuwania użytkownika
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
            App::getDB()->delete('uzytkownicy', ['id' => $_POST['delete_user_id']]);
            App::getMessages()->addMessage(new Message("Użytkownik został usunięty.", Message::INFO));
        }

        // Pobranie listy użytkowników
        $users = App::getDB()->select('uzytkownicy', [
            "[>]role_uzytkownikow" => ["id" => "uzytkownik_id"],
            "[>]role" => ["role_uzytkownikow.rola_id" => "id"]
        ], [
            "uzytkownicy.id",
            "uzytkownicy.email",
            "role.nazwa_roli"
        ]);

        // Przekazanie danych do widoku
        App::getSmarty()->assign('users', $users);
        App::getSmarty()->display('adminPanel.tpl');
    }

public function action_promoteToAdmin() {
    // Start sesji
    session_start();

    // Sprawdzenie, czy użytkownik jest zalogowany
    if (!isset($_SESSION['user']['id'])) {
        App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
        App::getRouter()->redirectTo('home');
        return;
    }

    // Sprawdzenie, czy użytkownik ma uprawnienia administratora
    $userId = $_SESSION['user']['id'];
    $roleId = App::getDB()->get('role_uzytkownikow', 'rola_id', ['uzytkownik_id' => $userId]);

    if ($roleId != 1) {
        App::getMessages()->addMessage(new Message("Brak dostępu do tej akcji.", Message::ERROR));
        App::getRouter()->redirectTo('adminPanel');
        return;
    }

    // Sprawdzenie danych z formularza
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['promote_user_id'])) {
        $promoteUserId = intval($_POST['promote_user_id']);
        
        // Aktualizacja roli użytkownika w bazie danych
       $existingRole = App::getDB()->get('role_uzytkownikow', 'rola_id', ['uzytkownik_id' => $promoteUserId]);

if (!$existingRole) {
    // Dodaj nowy rekord z rolą administratora
    App::getDB()->insert('role_uzytkownikow', [
        'uzytkownik_id' => $promoteUserId,
        'rola_id' => 1,
        'data_przypisania' => date('Y-m-d H:i:s')
    ]);
    App::getMessages()->addMessage(new Message("Użytkownik został promowany na administratora.", Message::INFO));
} else {
    // Aktualizacja istniejącej roli
    App::getDB()->update('role_uzytkownikow', ['rola_id' => 1], ['uzytkownik_id' => $promoteUserId]);
    App::getMessages()->addMessage(new Message("Użytkownikowi nadano uprawnienia administratora.", Message::INFO));
}
    }

    // Przekierowanie z powrotem do panelu admina
    App::getRouter()->redirectTo('adminPanel');
}
public function action_adminChangePassword() {
        $adminRoleId = 1;  
        $currentUser = $_SESSION['user'] ?? null;

        // Sprawdzenie, czy użytkownik ma rolę administratora
        if (!$currentUser || $currentUser['role_id'] != $adminRoleId) {
            App::getMessages()->addMessage(new Message("Brak uprawnień do wykonania tej operacji.", Message::ERROR));
            App::getRouter()->redirectTo('home');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Walidacja
            if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
                App::getMessages()->addMessage(new Message("Wszystkie pola są wymagane.", Message::ERROR));
            } elseif ($newPassword !== $confirmPassword) {
                App::getMessages()->addMessage(new Message("Nowe hasła muszą być zgodne.", Message::ERROR));
            } elseif (strlen($newPassword) < 8) {
                App::getMessages()->addMessage(new Message("Nowe hasło musi mieć co najmniej 8 znaków.", Message::ERROR));
            } else {
                // Pobranie użytkownika na podstawie adresu e-mail
                $user = App::getDB()->get('uzytkownicy', ['id'], ['email' => $email]);

                if (!$user) {
                    App::getMessages()->addMessage(new Message("Nie znaleziono użytkownika o podanym adresie e-mail.", Message::ERROR));
                } else {
                    // Aktualizacja hasła użytkownika
                    App::getDB()->update('uzytkownicy', [
                        'haslo' => password_hash($newPassword, PASSWORD_DEFAULT)
                    ], [
                        'id' => $user['id']
                    ]);

                    App::getMessages()->addMessage(new Message("Hasło użytkownika zostało zmienione.", Message::INFO));
                }
            }
        }

        // Wyświetlenie formularza
        App::getSmarty()->display('admin_change_password.tpl');
    }

}