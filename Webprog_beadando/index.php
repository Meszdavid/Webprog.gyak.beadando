<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

$page = $_GET['page'] ?? 'home';
$allowed = ['home', 'gallery', 'contact', 'messages', 'auth', 'logout'];
if (!in_array($page, $allowed)) $page = 'home';

include 'templates/layout.php';
?>