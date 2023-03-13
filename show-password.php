<?php 
session_start();
include __DIR__ . '/index.php';
if(!empty($_SESSION['generate_password'])) {
echo "La password generata è: " . $_SESSION['generate_password'];
}
?>