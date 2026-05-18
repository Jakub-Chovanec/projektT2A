<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Canon RF-S detail/detail 1.webp" alt="Canon RF-S 18-150mm f/3,5-6,3 IS STM">
        </div>


        <div class="product-info">
            <h2>Canon RF-S 18-150mm f/3,5-6,3 IS STM</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Canon RF-S 18-150 mm je lehký a kompaktní objektiv spadají do řady EOS R,
                který oplývá zoomem pro fotoaparáty využívající APS-C snímač.
                Objektiv nabídne optickou stabilizaci obrazu s rozsahem 4,5 EV
                a jako bonus efektivní rozsah 18-150 mm, díky čemuž zachytíte
                působivé snímky zblízka i zdálky. 
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Bajonet Canon RF</li>
                <li>Typ objektivu Zoom</li>
                <li>Min. ohnisková vzdálenost 18 mm</li>
                <li>Max. ohnisková vzdálenost (přepočet na 35mm) 240 mm</li>
            </ul>
            <br>
            <br>

            <p class="product-price">14 490,-</p>


            <a href="košík-krok-1.html" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Canon RF-S detail/detail 2.webp" alt="Canon RF-S 18-150mm f/3,5-6,3 IS STM – detail 1">
             
        <img src="Assets/images/Canon RF-S detail/detail 3.webp" alt="Canon RF-S 18-150mm f/3,5-6,3 IS STM – detail 2">

        <img src="Assets/images/Canon RF-S detail/detail 4.webp" alt="Canon RF-S 18-150mm f/3,5-6,3 IS STM – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>