<?php
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$vorname = $_POST['vorname'];
$email = $_POST['email'];
$strasse = $_POST['strasse'];
$hausnummer = $_POST['hausnummer'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];
$admin = $_POST['admin'];


$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("UPDATE benutzer SET Vorname = ?, Name = ?, Email = ?, Strasse = ?, Hausnummer = ?, PLZ = ?, Ort = ? WHERE ID = ?");

$statement->execute(array($vorname, $name, $email, $strasse, $hausnummer, $plz, $ort, $id));

header("Location: profil.php");

?>



