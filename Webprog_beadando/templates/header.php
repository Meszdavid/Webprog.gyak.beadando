<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Autókereskedés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Autókereskedés</h1>
    <?php if (is_logged_in()): ?>
        <p>Bejelentkezett: <?= $_SESSION['user']['fullname'] ?> (<?= $_SESSION['user']['username'] ?>)</p>
    <?php endif; ?>
    <?php include 'templates/menu.php'; ?>
</header>
<main>