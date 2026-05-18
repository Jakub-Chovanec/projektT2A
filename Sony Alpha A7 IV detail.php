<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Sony Alpha A7 IV detail/OS170b.webp" alt="Sony Alpha A7 IV">
        </div>


        <div class="product-info">
            <h2>Sony Alpha A7 IV</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
               Sony Alpha 7 IV je zbrusu nový hybridní fotoaparát pro zachycení kvalitních
               fotografií, plynulých videí i zprostředkování živých streamů. Jeho 
               zpracování i funkce ocení i nároční tvůrci obsahu. Obrazový snímač CMOS s 
               rozlišením 33 megapixelů a procesor BIONZ XR vám dovolí zachytit 
               nádherné snímky a videa plné detailů a barev.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Full Frame snímač 33 Mpx</li>
                <li>4K video</li>
                <li>Výměnné objektivy Sony FE</li>
                <li>Maximální rychlost sekvenčního snímání 10 sn./s</li>
            </ul>
            <br>
            <br>

            <p class="product-price">64 402,-</p>


            <a href="košík-krok-1.php" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 1 detail.webp" alt="Sony Alpha A7 IV – detail 1">
             
        <img src="Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 2 detail.webp" alt="Sony Alpha A7 IV – detail 2">

        <img src="Assets/images/Sony Alpha A7 IV detail/Sony Alpha A7 IV 3 detail.webp" alt="Sony Alpha A7 IV – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>