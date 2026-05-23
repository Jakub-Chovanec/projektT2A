<?php
declare(strict_types=1);
require __DIR__ . '/src/bootstrap.php';
http_response_code(404);
?>
<?php require __DIR__ . '/partials/header.php'; ?>
<main class="main centered-content error-page">
    <h1>404 - Stránka nenalezena</h1>
    <p>Omlouváme se, ale požadovaná stránka nebo produkt neexistuje.</p>
    <br>
    <a href="index.php" class="btn-next">Zpět na hlavní stranu</a>
</main>
<?php require __DIR__ . '/partials/footer.php'; ?>