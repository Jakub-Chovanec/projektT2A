<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Canon EOS R6 Mark III detail/detail 1.webp" alt="Canon EOS R6 Mark III">
        </div>


        <div class="product-info">
            <h2>Canon EOS R6 Mark III</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Digitální fotoaparát - bezzrcadlovka, Full Frame 32,5 Mpx, bajonet Canon RF,
                stabilizace obrazu na snímači (IBIS), max. rychlost frekvenčního snímání 40 sn./s,
                elektronický hledáček 3,69 Mpx, otočný / výklopný displej, 6K/119,9p
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Full Frame snímač 32,5 Mpx</li>
                <li>6K video</li>
                <li>Výměnné objektivy  Canon RF</li>
                <li>Maximální rychlost sekvenčního snímání 40 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">84 490,-</p>


            <a href="košík-krok-1.html" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Canon EOS R6 Mark III detail/detail 2.webp" alt="Canon EOS R6 Mark III – detail 1">
             
        <img src="Assets/images/Canon EOS R6 Mark III detail/detail 3.webp" alt="Canon EOS R6 Mark III – detail 2">

        <img src="Assets/images/Canon EOS R6 Mark III detail/detail 4.webp" alt="Canon EOS R6 Mark III – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>