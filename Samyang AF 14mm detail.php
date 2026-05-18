<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Samyang AF 14mm detail/detail 1.webp" alt="Samyang AF 14mm f/2.8 Sony FE">
        </div>


        <div class="product-info">
            <h2>Samyang AF 14mm f/2.8 Sony FE</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Širokoúhlý objektiv s automatickým ostřením Samyang AF 14mm f/2.8
                Sony FE pro full frame a APS-C digitální fotoaparáty je navržený
                pro bezkonkurenční kvalitu obrazu a vysoký optický výkon. 
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Bajonet Sony FE</li>
                <li>Pro snímač APS-C, Full Frame</li>
                <li>Typ objektivu Pevné ohnisko</li>
                <li>Min. ohnisková vzdálenost 14 mm</li>
                <li>Max. ohnisková vzdálenost 14 mm</li>
            </ul>
            <br>
            <br>

            <p class="product-price">16 890,-</p>


            <a href="košík-krok-1.html" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Samyang AF 14mm detail/detail 2.webp" alt="Samyang AF 14mm f/2.8 Sony FE – detail 1">
             
        <img src="Assets/images/Samyang AF 14mm detail/detail 3.webp" alt="Samyang AF 14mm f/2.8 Sony FE – detail 2">

        <img src="Assets/images/Samyang AF 14mm detail/detail 1.webp" alt="Samyang AF 14mm f/2.8 Sony FE – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>