<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main>

<!-- KROKY KOŠÍKU -->
<section class="checkout-steps">
    <div class="step">Košík</div>
    <div class="step active">Doprava a platba</div>
    <div class="step">Potvrzení</div>
</section>

<h2>Doprava a platba</h2>

<section class="form1">
<form class="checkout-form">

    <h3>Kontaktní údaje</h3>

    <label>
        Jméno
        <input type="text" placeholder="Jan" required>
    </label>

    <label>
        Příjmení
        <input type="text" placeholder="Novák" required>
    </label>

    <label>
        E-mail
        <input type="email" placeholder="jan@email.cz" required>
    </label>

    <label>
        Telefon
        <input type="text" placeholder="+420 123 456 789" required>
    </label>

    <h3>Doprava</h3>

    <label>
        <input type="radio" name="doprava">
        Zásilkovna – 79 Kč
    </label>

    <label>
        <input type="radio" name="doprava">
        Kurýr – 129 Kč
    </label>


    <h3>Platba</h3>

    <label>
        <input type="radio" name="platba">
        Kartou online
    </label>

    <label>
        <input type="radio" name="platba">
        Dobírka
    </label>

</form>
</section>

<a href="košík-krok-3.html" class="btn-next">
        Pokračovat →
    </a>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>