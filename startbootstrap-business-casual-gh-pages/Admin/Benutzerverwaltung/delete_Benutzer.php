<?php
session_start();
$id = $_POST['id'];
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("DELETE FROM benutzer WHERE ID = '$id'");
$statement->execute(array());

header("Location: benutzerverwaltung.php");
?>