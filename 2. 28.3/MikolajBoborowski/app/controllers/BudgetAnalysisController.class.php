<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;
use PDO;

/**
 * Kontroler do analizy budżetu
 */
class BudgetAnalysisController {
    public function action_budgetAnalysis() {
        $userId = $_SESSION['user']['id'] ?? null;

        if (!$userId) {
            App::getMessages()->addMessage(new Message("Nie jesteś zalogowany.", Message::ERROR));
            App::getRouter()->redirectTo('login');
            return;
        }

        // Pobieranie parametrów daty
        $startDate = $_GET['start_date'] ?? '2000-01-01';
        $endDate = $_GET['end_date'] ?? date('Y-m-d');

        try {
            // Połączenie z bazą danych
            $pdo = App::getDB()->pdo;

            // Suma przychodów
            $stmt = $pdo->prepare("
                SELECT SUM(kwota) AS suma 
                FROM transakcje 
                WHERE uzytkownik_id = :userId 
                  AND typ = 'przychód' 
                  AND data_transakcji BETWEEN :startDate AND :endDate
            ");
            $stmt->execute(['userId' => $userId, 'startDate' => $startDate, 'endDate' => $endDate]);
            $incomeSum = $stmt->fetch(PDO::FETCH_ASSOC)['suma'] ?? 0;

            // Suma wydatków
            $stmt = $pdo->prepare("
                SELECT SUM(kwota) AS suma 
                FROM transakcje 
                WHERE uzytkownik_id = :userId 
                  AND typ = 'wydatek' 
                  AND data_transakcji BETWEEN :startDate AND :endDate
            ");
            $stmt->execute(['userId' => $userId, 'startDate' => $startDate, 'endDate' => $endDate]);
            $expenseSum = $stmt->fetch(PDO::FETCH_ASSOC)['suma'] ?? 0;

            // Bilans
            $balance = $incomeSum - $expenseSum;

            // Podział wydatków na kategorie
            $stmt = $pdo->prepare("
                SELECT kategoria, SUM(kwota) AS suma 
                FROM transakcje 
                WHERE uzytkownik_id = :userId 
                  AND typ = 'wydatek' 
                  AND data_transakcji BETWEEN :startDate AND :endDate
                GROUP BY kategoria
                ORDER BY suma DESC
            ");
            $stmt->execute(['userId' => $userId, 'startDate' => $startDate, 'endDate' => $endDate]);
            $expenseBreakdown = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Podział przychodów na kategorie
            $stmt = $pdo->prepare("
                SELECT kategoria, SUM(kwota) AS suma 
                FROM transakcje 
                WHERE uzytkownik_id = :userId 
                  AND typ = 'przychód' 
                  AND data_transakcji BETWEEN :startDate AND :endDate
                GROUP BY kategoria
                ORDER BY suma DESC
            ");
            $stmt->execute(['userId' => $userId, 'startDate' => $startDate, 'endDate' => $endDate]);
            $incomeBreakdown = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Przekazanie danych do widoku
            App::getSmarty()->assign('incomeSum', $incomeSum);
            App::getSmarty()->assign('expenseSum', $expenseSum);
            App::getSmarty()->assign('balance', $balance);
            App::getSmarty()->assign('expenseBreakdown', $expenseBreakdown);
            App::getSmarty()->assign('incomeBreakdown', $incomeBreakdown);
            App::getSmarty()->assign('startDate', $startDate);
            App::getSmarty()->assign('endDate', $endDate);
            App::getSmarty()->display('budgetAnalysis.tpl');
        } catch (\PDOException $e) {
            App::getMessages()->addMessage(new Message("Błąd bazy danych: " . $e->getMessage(), Message::ERROR));
        }
    }
}
