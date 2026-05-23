<?php
declare(strict_types=1);

require __DIR__ . '/src/bootstrap.php';
require_once __DIR__ . '/src/Validator.php';

// Pokud je košík prázdný, nepouštíme uživatele k objednávce
if ($cart->isEmpty()) {
    header('Location: kosik.php');
    exit;
}

$errors = [];
$data = $_SESSION['checkout_data'] ?? [
    'firstname' => '',
    'lastname' => '',
    'email' => '',
    'phone' => '',
    'street' => '',
    'city' => '',
    'zip' => '',
    'note' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'firstname' => trim($_POST['firstname'] ?? ''),
        'lastname' => trim($_POST['lastname'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'street' => trim($_POST['street'] ?? ''),
        'city' => trim($_POST['city'] ?? ''),
        'zip' => trim($_POST['zip'] ?? ''),
        'note' => trim($_POST['note'] ?? '')
    ];

    $v = new Validator();
    $v->required('firstname', $data['firstname'], 'Jméno je povinné.')
      ->required('lastname', $data['lastname'], 'Příjmení je povinné.')
      ->required('email', $data['email'], 'E-mail je povinný.')
      ->email('email', $data['email'], 'Zadejte platný e-mail.')
      ->required('phone', $data['phone'], 'Telefon je povinný.')
      ->required('street', $data['street'], 'Ulice a č.p. jsou povinné.')
      ->required('city', $data['city'], 'Město je povinné.')
      ->required('zip', $data['zip'], 'PSČ je povinné.')
      ->pattern('zip', $data['zip'], '/^\d{3}\s?\d{2}$|^\d{5}$/', 'PSČ musí mít 5 číslic.');

    if ($v->isValid()) {
        $_SESSION['checkout_data'] = $data;
        header('Location: objednavka-2.php');
        exit;
    }
    
    $errors = $v->getErrors();
}
?>

<?php require __DIR__ . '/partials/header.php'; ?>

<main class="main">
    <div class="checkout-steps">
        <div class="step active">1. Dodací údaje</div>
        <div class="step">2. Doprava a platba</div>
        <div class="step">3. Shrnutí</div>
    </div>

    <section class="form1">
        <h2>Dodací údaje</h2>
        <form action="objednavka-1.php" method="POST" class="checkout-form">
            <label>
                Jméno *
                <input type="text" name="firstname" value="<?= htmlspecialchars($data['firstname']) ?>" class="<?= isset($errors['firstname']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['firstname'])): ?><span class="error-message"><?= $errors['firstname'] ?></span><?php endif; ?>
            </label>
            <label>
                Příjmení *
                <input type="text" name="lastname" value="<?= htmlspecialchars($data['lastname']) ?>" class="<?= isset($errors['lastname']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['lastname'])): ?><span class="error-message"><?= $errors['lastname'] ?></span><?php endif; ?>
            </label>
            <label>
                E-mail *
                <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" class="<?= isset($errors['email']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['email'])): ?><span class="error-message"><?= $errors['email'] ?></span><?php endif; ?>
            </label>
            <label>
                Telefon *
                <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" class="<?= isset($errors['phone']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['phone'])): ?><span class="error-message"><?= $errors['phone'] ?></span><?php endif; ?>
            </label>
            <label>
                Ulice a č. p. *
                <input type="text" name="street" value="<?= htmlspecialchars($data['street']) ?>" class="<?= isset($errors['street']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['street'])): ?><span class="error-message"><?= $errors['street'] ?></span><?php endif; ?>
            </label>
            <label>
                Město *
                <input type="text" name="city" value="<?= htmlspecialchars($data['city']) ?>" class="<?= isset($errors['city']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['city'])): ?><span class="error-message"><?= $errors['city'] ?></span><?php endif; ?>
            </label>
            <label>
                PSČ *
                <input type="text" name="zip" value="<?= htmlspecialchars($data['zip']) ?>" placeholder="123 45" class="<?= isset($errors['zip']) ? 'input-error' : '' ?>">
                <?php if (isset($errors['zip'])): ?><span class="error-message"><?= $errors['zip'] ?></span><?php endif; ?>
            </label>
            <label class="full-width">
                Poznámka k objednávce
                <textarea name="note" rows="3" class="note-textarea"><?= htmlspecialchars($data['note']) ?></textarea>
            </label>
            
            <div class="checkout-actions">
                <a href="kosik.php" class="back">← Zpět do košíku</a>
                <button type="submit" class="btn-next">Pokračovat k dopravě</button>
            </div>
        </form>
    </section>
</main>

<?php require __DIR__ . '/partials/footer.php'; ?>
