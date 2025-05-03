<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $message = sanitize($_POST['message']);

    if (!$name || !$email || !$message || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Minden mező kötelező és az emailnek helyes formátumúnak kell lennie.";
    } else {
        $stmt = $dbh->prepare("INSERT INTO messages (name, email, message, created_at, user_id) VALUES (?, ?, ?, NOW(), ?)");
        $stmt->execute([$name, $email, $message, $_SESSION['user']['id'] ?? null]);
        redirect('index.php?page=messages');
    }
}
?>
<h2>Kapcsolat</h2>
<?php foreach ($errors as $e) echo "<p class='error'>$e</p>"; ?>
<form method="post" id="contactForm">
    <input type="text" name="name" placeholder="Név" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Üzenet" required></textarea>
    <button type="submit">Küldés</button>
</form>