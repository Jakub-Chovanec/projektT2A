<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/repository/CategoryRepository.php';

$slug = $_GET['slug'] ?? '';
$categoryRepo = new CategoryRepository($pdo);
$category = $categoryRepo->getBySlug($slug);

if (!$category) {
    header('Location: 404.php');
    exit;
}

// Definice značek a jejich log (v reálném e-shopu by to mohlo být taky v DB)
$brands = [
    ['name' => 'Sony', 'logo' => 'Assets/images/sony_logo.png'],
    ['name' => 'Canon', 'logo' => 'Assets/images/Canon_logo.png'],
    ['name' => 'Fujifilm', 'logo' => 'Assets/images/Fujifilm-logo.png']
];
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <section class="category-products">
        <h2 class="main-category-title">Značky pro <?= htmlspecialchars($category->name) ?></h2>
        <div class="products-k flex-center">
            <?php foreach ($brands as $brand): ?>
                <article class="product-k">
                    <a href="produkty.php?slug=<?= htmlspecialchars($category->slug) ?>&brand=<?= htmlspecialchars($brand['name']) ?>" class="category-odkaz">
                        <img class="category-img" src="<?= htmlspecialchars($brand['logo']) ?>" alt="<?= htmlspecialchars($brand['name']) ?>">
                        <h3 class="category-text"><?= htmlspecialchars($brand['name']) ?> <?= htmlspecialchars($category->name) ?></h3>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="centered-content mt-2">
        <a href="index.php" class="back">← Zpět na výběr kategorie</a>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>