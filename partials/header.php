<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Assets/CSS/style.CSS">
</head>
<body>
<header>
    <section class="header">
        <h1>FOTO-SHOP</h1>
        <img class="logo" src="https://img.freepik.com/free-psd/camera-outline-logo-design_23-2151263987.jpg?semt=ais_hybrid&w=740&q=80" alt="logo">
    </section>
</header>

<nav class="nav">
    <a href="index.php">Domů</a>
    <a href="kontakt.php">Kontakt</a>
    <a href="O-nas.php">O nás</a>
    <a href="kosik.php" class="nav-link-kosik">
    Košík (<?= $cart->getTotalCount() ?>)
</a>

</nav>
</body>
</html>