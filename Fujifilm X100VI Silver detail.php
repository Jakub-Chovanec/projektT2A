<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/FujiFilm X100VI detail/detail 1.webp" alt="Fujifilm X100VI">
        </div>


        <div class="product-info">
            <h2>Fujifilm X100VI</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Fujifilm X100VI Silver je šestou generací legendární řady X100,
                která kombinuje ikonický retro design s pormyšlenými technologiemi.
                Fotoaparát je vybaven 40,2Mpx snímačem X-Trans CMOS 5 HR a výkonným obrazovým procesorem X-Processor 5,
                což zajišťuje špičkovou obrazovou kvalitu a vysokou rychlost zpracování dat.
                Disponuje stabilizací obrazu v těle (IBIS) s účinností až 6 EV,
                díky níž lze dosahovat ostrých snímků i při delších časech.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>APS-C snímač 40,2 Mpx</li>
                <li>6K video</li>
                <li>Minimální čas závěrky 1/30 s</li>
                <li>Maximální rychlost sekvenčního snímání 20 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">44 990,-</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/FujiFilm X100VI detail/detail 2.webp" alt="Fujifilm X100VI – detail 1">
             
        <img src="Assets/images/FujiFilm X100VI detail/detail 3.webp" alt="Fujifilm X100VI – detail 2">

        <img src="Assets/images/FujiFilm X100VI detail/detail 4.webp" alt="Fujifilm X100VI – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>