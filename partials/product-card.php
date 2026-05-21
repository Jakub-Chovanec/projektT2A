<?php /** @var ProductDTO $product */ ?>
<article class="product">
    <a href="produkt.php?id=<?= $product->id ?>" class="product-odkaz">
        <img class="product-img" src="<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>">
        <h4 class="product-name"><?= htmlspecialchars($product->name) ?></h4>
    </a>
    <p class="product-price"><?= htmlspecialchars(number_format($product->price, 0, ',', ' ')) ?>,- Kč</p>
</article>