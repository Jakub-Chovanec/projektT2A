<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/Validator.php';

$success = false;
$errors = [];
$data = ['email' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['email'] = trim($_POST['email'] ?? '');
    $data['message'] = trim($_POST['message'] ?? '');

    $v = new Validator();
    $v->required('email', $data['email'], 'E-mail je povinný.')
      ->email('email', $data['email'], 'Neplatný formát e-mailu.')
      ->required('message', $data['message'], 'Zpráva nesmí být prázdná.')
      ->minLength('message', $data['message'], 10, 'Zpráva musí mít alespoň 10 znaků.');

    if ($v->isValid()) {
        $success = true;
        $data = ['email' => '', 'message' => '']; // Vyčistit po odeslání
    } else {
        $errors = $v->getErrors();
    }
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main>
    <div class="form1">

        <h2>Kontakt</h2>

        <div class="info-card">
            <p><strong>E-mail:</strong> info@fotojb.cz</p>
            <p><strong>Telefon:</strong> +420 123 456 789</p>
            <p><strong>Adresa:</strong> Praha, Česká republika</p>

            <hr>

            <p>
                Máte dotaz? Neváhejte nás kontaktovat.
            </p>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <strong>Zpráva byla úspěšně odeslána!</strong>
            </div>
        <?php endif; ?>

        <form action="kontakt.php" method="POST" class="checkout-form">
            <label>
                Váš E-mail
                <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" class="<?= isset($errors['email']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['email'])): ?><span class="error-message"><?= htmlspecialchars($errors['email']) ?></span><?php endif; ?>
            </label>
            <label>
                Zpráva
                <textarea name="message" rows="5" class="<?= isset($errors['message']) ? 'input-error' : '' ?>"><?= htmlspecialchars($data['message']) ?></textarea>
                <?php if (isset($errors['message'])): ?><span class="error-message"><?= htmlspecialchars($errors['message']) ?></span><?php endif; ?>
            </label>
            <button type="submit" class="btn-next">Odeslat dotaz</button>
        </form>
    </div>

    <div class="centered-content mt-2">
        <a class="back" href="index.php">← Zpět na přehled</a>
    </div>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>