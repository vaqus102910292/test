<?php
// register.php

// Połączenie z bazą danych (do uzupełnienia)
$host = 'localhost';
$dbname = 'nazwa_bazy_danych';
$username = 'nazwa_uzytkownika';
$password = 'haslo';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Błąd połączenia: ' . $e->getMessage();
}

// Obsługa formularza rejestracji
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Zaszyfrowane hasło

    // Zapisanie danych do bazy danych (do uzupełnienia)
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    echo 'Zarejestrowano pomyślnie!';
}
?>
