<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">

    <section class="product-detail">

        <div class="product-images">
            <img src="Assets/images/Canon EF 50mm detail/detail 1.webp" alt="Canon EF 50mm f/1.8 STM">
        </div>


        <div class="product-info">
            <h2>Canon EF 50mm f/1.8 STM</h2>

        <section class="product-description">
            <h3>Popis produktu</h3>
            <p>
                Objektiv Canon EF 50 mm f/1.8 STM nechá vaše objekty vyniknout oproti rozostřenému pozadí.
                Současně vám umožní vyfotografovat objekty pěkně detailně,
                aniž byste se museli přiblížit nepříjemně blízko a riskovali
                nepřirozený výraz ve tváři fotografované osoby. Pokud objektiv připojíte k plnoformátovému
                fotoaparátu EOS, bude fungovat jako standardní objektiv a nabídne
                perspektivu podobnou lidskému oku.
            </p>
        </section>
        <br>
        <br>

            <ul class="product-specs">
                <li>Bajonet Canon EF</li>
                <li>Typ objektivu Pevné ohnisko</li>
                <li>Snímač APS-C, Full Frame</li>
                <li>Min. ohnisková vzdálenost 50 mm</li>
                <li>Max. ohnisková vzdálenost 50 mm</li>
            </ul>
            <br>
            <br>

            <p class="product-price">2 999,-</p>


            <a href="košík-krok-1.html" class="cart">
                Přidat do košíku
            </a>
        </div>

    </section>

    <section class="product-gallery">

    <div class="gallery-grid">
        <img src="Assets/images/Canon EF 50mm detail/detail 2.webp" alt="Canon EF 50mm f/1.8 STM – detail 1">
             
        <img src="Assets/images/Canon EF 50mm detail/detail 3.webp" alt="Canon EF 50mm f/1.8 STM – detail 2">

        <img src="Assets/images/Canon EF 50mm detail/detail 1.webp" alt="Canon EF 50mm f/1.8 STM – detail 3">
    </div>
</section>


</main>

<?php require __DIR__ . '/partials/footer.php'; ?>