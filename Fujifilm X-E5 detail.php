<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Fujifilm X-E5 detail/detail 1.webp" alt="Fujifilm X-E5 III">
        </div>


        <div class="product-info">
            <h2>Fujifilm X-E5</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                FUJIFILM X-E5 ve stříbrném provedení zaujme každého,
                kdo touží po spojení nadčasového designu a moderních technologií.
                Kompaktní bezzrcadlovka vychází z klasické filozofie značky,
                zároveň ale nabízí výhody výměnných objektivů a moderní výbavu v čele s 40,2Mpx APS-C snímačem,
                pokročilou pětiosou stabilizací a rychlým autofokusem řízeným umělou inteligencí.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>APS-C snímač 40,2 Mpx</li>
                <li>6K video</li>
                <li>Výměnné objektivy  Fujifilm X</li>
                <li>Maximální rychlost sekvenčního snímání 20 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">38 990,-</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Fujifilm X-E5 detail/detail 2.webp" alt="Fujifilm X-E5 – detail 1">
             
        <img src="Assets/images/Fujifilm X-E5 detail/detail 3.webp" alt="Fujifilm X-E5 – detail 2">

        <img src="Assets/images/Fujifilm X-E5 detail/detail 4.webp" alt="Fujifilm X-E5 – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>