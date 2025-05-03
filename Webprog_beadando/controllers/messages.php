<?php
if (!is_logged_in()) redirect('index.php');
$stmt = $dbh->query("SELECT * FROM messages ORDER BY created_at DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Üzenetek</h2>
<table>
    <tr><th>Feladó</th><th>Email</th><th>Üzenet</th><th>Időpont</th></tr>
    <?php foreach ($messages as $msg): ?>
        <tr>
            <td><?= $msg['name'] ?? 'Vendég' ?></td>
            <td><?= $msg['email'] ?></td>
            <td><?= $msg['message'] ?></td>
            <td><?= $msg['created_at'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>