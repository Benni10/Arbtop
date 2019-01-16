<?php
session_start();
$pId = $_POST['pId'];
$bId = $_POST['bId'];

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("INSERT INTO warenkorb VALUES (?, ?, ?)");
if($statement->execute(array('', $bId, $pId)))
{

}

header("Location: benutzerverwaltung.php");
die();
?>