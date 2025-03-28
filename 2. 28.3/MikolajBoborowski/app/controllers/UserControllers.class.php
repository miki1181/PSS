<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
class UserControllers {
    
    public function action_register() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                App::getMessages()->addMessage(new Message('Podano nieprawidłowy adres email.', Message::ERROR));
            } elseif ($password !== $confirmPassword) {
                App::getMessages()->addMessage(new Message('Hasła się nie zgadzają.', Message::ERROR));
            } elseif (strlen($password) < 6) {
                App::getMessages()->addMessage(new Message('Hasło musi mieć co najmniej 6 znaków.', Message::ERROR));
            } else {
                $existingUser = App::getDB()->get('uzytkownicy', '*', ['email' => $email]);
                if ($existingUser) {
                    App::getMessages()->addMessage(new Message('Użytkownik z podanym emailem już istnieje.', Message::ERROR));
                } else {
                    App::getDB()->insert('uzytkownicy', [
                        'email' => $email,
                        'haslo' => password_hash($password, PASSWORD_BCRYPT),
                        'data_utworzenia' => date('Y-m-d H:i:s')
                    ]);
                    App::getMessages()->addMessage(new Message('Rejestracja zakończona sukcesem. Możesz się zalogować.', Message::INFO));
                }
            }
        }

        App::getSmarty()->assign("email", $email);
        App::getSmarty()->display("register.tpl");
    }



    public function action_login() {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Pobieranie użytkownika z bazy danych
        $user = App::getDB()->get('uzytkownicy', '*', ['email' => $email]);

        if (!$user) {
            App::getMessages()->addMessage(new \core\Message('Nieprawidłowy email lub hasło.', \core\Message::ERROR));
        } elseif (!password_verify($password, $user['haslo'])) {
            App::getMessages()->addMessage(new \core\Message('Nieprawidłowy email lub hasło.', \core\Message::ERROR));
        } else {
            // Pobranie roli użytkownika z tabeli role_uzytkownikow
            $roleId = App::getDB()->get('role_uzytkownikow', 'rola_id', [
                'uzytkownik_id' => $user['id']
            ]);

            // Logowanie zakończone sukcesem - ustawienie sesji z informacjami o użytkowniku
            $_SESSION['user'] = [
                'id' => $user['id'],
                'email' => $user['email'],
                'role_id' => $roleId  // Dodanie ID roli do sesji
            ];

            App::getMessages()->addMessage(new \core\Message('Zalogowano pomyślnie.', \core\Message::INFO));
            App::getRouter()->redirectTo('home'); // Przekierowanie na stronę główną
        }
    }

    App::getSmarty()->assign("email", $email);
    App::getSmarty()->display("login.tpl");
}
public function action_changePassword() {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Pobieramy dane z formularza
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Walidacja danych
            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
                App::getMessages()->addMessage(new Message("Wszystkie pola są wymagane.", Message::ERROR));
            } elseif ($newPassword !== $confirmPassword) {
                App::getMessages()->addMessage(new Message("Nowe hasła muszą być zgodne.", Message::ERROR));
            } elseif (strlen($newPassword) < 8) {
                App::getMessages()->addMessage(new Message("Nowe hasło musi mieć co najmniej 8 znaków.", Message::ERROR));
            } else {
                // Pobranie aktualnego hasła użytkownika
                $user = App::getDB()->get('uzytkownicy', ['haslo'], ['id' => $userId]);

                if (!$user || !password_verify($currentPassword, $user['haslo'])) {
                    App::getMessages()->addMessage(new Message("Obecne hasło jest nieprawidłowe.", Message::ERROR));
                } else {
                    // Aktualizacja hasła
                    App::getDB()->update('uzytkownicy', [
                        'haslo' => password_hash($newPassword, PASSWORD_DEFAULT)
                    ], [
                        'id' => $userId
                    ]);

                    App::getMessages()->addMessage(new Message("Hasło zostało zmienione.", Message::INFO));
                    
                }
            }
        }

        // Wyświetlenie formularza
        App::getSmarty()->display('change_password.tpl');
    }
public function action_logout() {
    session_start(); // Upewnij się, że sesja jest zainicjalizowana
    session_destroy(); // Usunięcie sesji
    App::getMessages()->addMessage(new \core\Message('Wylogowano pomyślnie.', \core\Message::INFO));
    App::getRouter()->redirectTo('home'); // Przekierowanie na stronę główną
}

}

