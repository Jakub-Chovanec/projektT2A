<?php

declare(strict_types=1);

// cesta k databázi
$dbPath = __DIR__ . '/../database/eshop.db';

// připojení k SQLite databázi
$pdo = new PDO('sqlite:' . $dbPath);

// nastavení chyb
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);