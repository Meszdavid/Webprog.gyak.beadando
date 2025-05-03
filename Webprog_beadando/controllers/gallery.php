<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && is_logged_in() && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    if (!is_dir('uploads')) {
        mkdir('uploads', 0777, true);
    }

    $target = 'uploads/' . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $target)) {
        echo "<p>Kép feltöltve: {$file['name']}</p>";
    } else {
        echo "<p>Hiba történt a feltöltés során.</p>";
    }
}
?>
<h2>Képgaléria</h2>
<?php if (is_logged_in()): ?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" required>
    <button type="submit">Feltöltés</button>
</form>
<?php endif; ?>
<div class="gallery">
<?php
$images = glob("uploads/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
foreach ($images as $img) {
    echo "<img src='$img' alt='' width='200'>";
}
?>
</div>