<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];
    $fullname = sanitize($_POST['fullname'] ?? '');
    if (isset($_POST['register'])) {
        $stmt = $dbh->prepare("INSERT INTO users (username, password, fullname) VALUES (?, ?, ?)");
        $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), $fullname]);
        echo "<p>Sikeres regisztráció!</p>";
    } elseif (isset($_POST['login'])) {
        $stmt = $dbh->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            redirect('index.php');
        } else {
            echo "<p>Hibás belépési adatok.</p>";
        }
    }
}
?>
<h2>Bejelentkezés / Regisztráció</h2>
<form method="post">
    <input type="text" name="username" placeholder="Felhasználónév" required>
    <input type="password" name="password" placeholder="Jelszó" required>
    <input type="text" name="fullname" placeholder="Teljes név (csak regisztrációhoz)">
    <button name="login" type="submit">Belépés</button>
    <button name="register" type="submit">Regisztráció</button>
</form>