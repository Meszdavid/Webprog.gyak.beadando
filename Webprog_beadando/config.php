<?php
$menu = [
    'home' => 'Főoldal',
    'gallery' => 'Képek',
    'contact' => 'Kapcsolat',
    'messages' => 'Üzenetek',
    'auth' => (isset($_SESSION['user']) ? 'Kilépés' : 'Belépés')
];

// adatbáziskapcsolat
try {
    $dbh = new PDO('mysql:host=localhost;dbname=autokereskedes', 'auto', 'auto1234', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
?>
