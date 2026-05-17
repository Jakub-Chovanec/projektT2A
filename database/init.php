<?php

$dbPath = __DIR__ . '/eshop.db';

// smaže starou DB
if (file_exists($dbPath)) {
    unlink($dbPath);
    echo "Stará databáze smazána.\n";
}

$db = new PDO('sqlite:' . $dbPath);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// vytvoření tabulky products
$db->exec('
    CREATE TABLE products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price INTEGER NOT NULL,
        image TEXT NOT NULL
    )
');

// vložení dat
$db->exec("
    INSERT INTO products (name, price, image) VALUES
    ('Sony Alpha A7 IV', 50000, 'Assets/images/OS170b.webp'),
    ('Sony ZV-E10', 20000, 'Assets/images/Sony Alpha ZV-E10.webp'),
    ('Fujifilm X100VI', 40000, 'Assets/images/FujiFilm X100VI Silver.webp'),
    ('Canon EOS 250D', 15000, 'Assets/images/Canon EOS 250D černý.webp')
");

echo "Databáze vytvořena!\n";