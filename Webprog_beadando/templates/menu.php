<nav>
    <ul>
        <?php foreach ($menu as $key => $value): ?>
            <?php if ($key === 'auth') $key = is_logged_in() ? 'logout' : 'auth'; ?>
            <?php if ($key === 'messages' && !is_logged_in()) continue; ?>
            <li><a href="index.php?page=<?= $key ?>"><?= $value ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>