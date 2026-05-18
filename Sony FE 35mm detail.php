<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Sony FE 35 mm .webp" alt="Sony FE 35mm f/1.8">
        </div>


        <div class="product-info">
            <h2>Sony FE 35mm f/1.8</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Sony FE 35 / 1.8 je příjemný lehký objektiv,
                který vám nezabere skoro žádné místo v brašně.
                Autofokus je rychlý a přesný. Kvalita obrazu je výborná
                včetně dobrého přenosu kontrastu. 
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Bajonet Sony E</li>
                <li>Snímač APS-C, Full Frame</li>
                <li>Typ objektivu Pevné ohnisko</li>
                <li>Min. ohnisková vzdálenost 35 mm</li>
                <li>Max. ohnisková vzdálenost 35 mm</li>
            </ul>
            <br>
            <br>

            <p class="product-price">18 990,-</p>


            <a href="košík-krok-1.html" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

</main>

<?php require __DIR__ . '/partials/footer.php'; ?>