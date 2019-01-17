<?php
session_start();
$pId = $_POST['pId'];
$bId = $_POST['bId'];
$menge = $_POST['amountInput'];

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("INSERT INTO warenkorb VALUES (?, ?, ?, ?)");
if($statement->execute(array('', $bId, $pId, $menge)))
{

}

header("Location: produkte.php");
die();
?>