<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail.webp" alt="Alpha ZV-E10 vlogovací fotoaparát">
        </div>


        <div class="product-info">
            <h2>Sony Alpha ZV-E10</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Sony Alpha ZV-E10 je kompaktní a výkonný fotoaparát navržený
                především pro vlogery a tvůrce videí. Nabízí špičkovou
                kvalitu obrazu, rychlé automatické ostření a jednoduché ovládání.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>APS-C snímač 24,2 Mpx</li>
                <li>4K video</li>
                <li>Výměnné objektivy Sony E</li>
                <li>Dotykový výklopný displej</li>
            </ul>
            <br>
            <br>

            <p class="product-price">18 990 Kč</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 1.webp" alt="Sony Alpha ZV-E10 – detail 1">
             
        <img src="Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 2.webp" alt="Sony Alpha ZV-E10 – detail 2">

        <img src="Assets/images/Sony ZV-E10 detail/Sony ZV-E10detail 3.webp" alt="Sony Alpha ZV-E10 – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>