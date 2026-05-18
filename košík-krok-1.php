<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main>

<!-- KROKY KOŠÍKU -->
<section class="checkout-steps">
    <div class="step active">Košík</div>
    <div class="step">Doprava a platba</div>
    <div class="step">Potvrzení</div>
</section>

<h2>Váš košík</h2>

<section class="form">
<!-- PRODUKT -->
<div class="cart-item">
    <img src="Assets/images/OS170b.webp" alt="">
    
    <div class="cart-info">
        <h3>Sony Alpha A7 IV</h3>
        <p>Full-frame bezzrcadlovka + objektiv</p>
    </div>

    <div class="cart-price">
        64 402,-
    </div>
</div>


<div class="cart-item">
    <img src="Assets/images/FujiFilm X100VI Silver.webp" alt="">
    
    <div class="cart-info">
        <h3>Fujifilm X100VI</h3>
        <p>Kompaktní fotoaparát</p>
    </div>

    <div class="cart-price">
        44 990,-
    </div>
</div>


<div class="cart-total">
    Celkem: <strong>109 392 Kč</strong>
</div>
</section>

<a href="košík-krok-2.php" class="btn-next">
    Pokračovat →
</a>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>