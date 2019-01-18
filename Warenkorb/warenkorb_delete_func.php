<?php
session_start();
$id = $_POST['id'];
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("DELETE FROM warenkorb WHERE ID = '$id'");
$statement->execute(array());

header("Location: warenkorb.php");
?>