<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main>

<!-- KROKY KOŠÍKU -->
<section class="checkout-steps">
    <div class="step">Košík</div>
    <div class="step">Doprava a platba</div>
    <div class="step active">Potvrzení</div>
</section>

<h2>Shrnutí objednávky</h2>
<section class="form">

<div class="order-summary">
    <h3>Osobní údaje</h3>
    <p>Jméno: Jan Novák</p>
    <p>E-mail: jan.novnak@frengp.cz</p>
    <p>Telefon: +420 123 456 789</p>

    <h3>Produkty</h3>
    <p>Sony Alpha A7 IV, Fujifilm X100VI</p>

    <h3>Doprava</h3>
    <p>Kurýr</p>

    <h3>Platba</h3>
    <p>Kartou</p>

    <h3>Celkem: 109 392 Kč</h3>

</div>
</section>

<a href="kosik-final.php" class="btn-next">
    Potvrdit objednávku
</a>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>