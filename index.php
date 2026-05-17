<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/src/bootstrap.php';

//$cart = new Cart();
//$cartItemCount = $cart->getTotalQuantity();
?>

<?php require __DIR__ . '/Partials/header.php'; ?>

    
    <main class="main">

    <section class="recommended-products">
        <h2>Doporučené produkty</h2>

        <div class="products-r">

        <article class="product-r">
            <a href="Sony Alpha A7 IV detail.html" class="recommended-text">
            <img class="recommended-img" src="Assets/images/OS170b.webp" alt="Sony Alpha A7 IV + FE 28–70 mm">
            Sony Alpha A7 IV + FE 28–70 mm F3,5–5,6 OSS
            </a>
        </article>

        <article class="product-r">
            <a href="Sony ZV-E10 detail.html" class="recommended-text">
            <img class="recommended-img" src="Assets/images/Sony Alpha ZV-E10.webp" alt="Sony Alpha ZV-E10">
                Sony Alpha ZV-E10 vlogovací fotoaparát + 16–50 mm f/3,5–5,6 OSS II
            </a>
        </article>

        <article class="product-r">
            <a href="Fujifilm X100VI Silver detail.html" class="recommended-text">
            <img class="recommended-img" src="Assets/images/FujiFilm X100VI Silver.webp" alt="Fujifilm X100VI Silver">
                Fujifilm X100VI Silver
            </a>
        </article>

        <article class="product-r">
            <a href="Canon EOS 250D detail.html" class="recommended-text">
            <img class="recommended-img" src="Assets/images/Canon EOS 250D černý.webp" alt="Canon EOS 250D černý">
                Canon EOS 250D černý + EF-S 18–55 mm f/4–5,6 IS STM
            </a>
        </article>

        </div>
    </section>
    
    <section class="category-products">

        <h2>Fotoaparáty</h2>

        <div class="products-k">

            <article class="product-k">
            <a href="produkty-sony-fotoaparaty.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/sony_logo.png" alt="Sony-fotoaparaty Kategorie">
                <h3 class="category-text">Sony fotoaparáty</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-canon-fotoaparaty.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/Canon_logo.png" alt="Canon-fotoaparaty Kategorie">
                <h3 class="category-text">Canon Fotoaparáty</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-fujifilm-fotoaparaty.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/Fujifilm-logo.png" alt="FujiFilm-fotoaparaty Kategorie">
                <h3 class="category-text">FujiFilm Fotoaparáty</h3>
            </a>
        </article>
        </div>

        <h2>Objektivy</h2>

        <div class="products-k">
        <article class="product-k">
            <a href="produkty-sony-objektivy.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/sony_logo.png" alt="Sony-objektivy Kategorie">
                <h3 class="category-text">Sony Objektity</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-canon-objektivy.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/Canon_logo.png" alt="Canon-objektivy Kategorie">
                <h3 class="category-text">Canon Objektivy</h3>
            </a>
        </article>

        <article class="product-k">
            <a href="produkty-fujifilm-objektivy.html" class="category-odkaz">
                <img class="category-img" src="Assets/images/Fujifilm-logo.png" alt="FujiFilm-objektivy Kategorie">
                <h3 class="category-text">FujiFilm Objektivy</h3>
            </a>
        </article>
        </div>
    </section>

    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>
        
    
