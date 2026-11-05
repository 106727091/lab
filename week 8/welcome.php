<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

include 'header.inc';

echo "Welcome, " . $_SESSION['user'];

include 'footer.inc';
?>