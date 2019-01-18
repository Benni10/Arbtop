<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
$id = $_POST['id'];
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("DELETE FROM produkt WHERE ID = '$id'");
$statement->execute(array());

header("Location: produktverwaltung.php");
?>