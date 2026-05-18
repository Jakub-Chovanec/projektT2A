<?php
declare(strict_types=1);

// nastavení chyb - musí být před připojením, aby zachytilo i chyby v něm
error_reporting(E_ALL);
ini_set('display_errors', '1');

// cesta k databázi
$dbPath = __DIR__ . '/../database/eshop.db';

// připojení k SQLite databázi
$pdo = new PDO('sqlite:' . $dbPath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>