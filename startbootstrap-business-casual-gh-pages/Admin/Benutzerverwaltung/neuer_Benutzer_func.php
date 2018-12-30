<?php
session_start();
$name = $_POST['name'];
$vorname = $_POST['vorname'];
$email = $_POST['email'];
$strasse = $_POST['strasse'];
$hausnummer = $_POST['hausnummer'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];
$passwort = password_hash($_POST['passwort'], PASSWORD_DEFAULT);
$admin = $_POST['admin'];

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("INSERT INTO benutzer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$statement->execute(array('', $vorname, $name, $email, $strasse, $hausnummer, $plz, $ort, $passwort, $admin));

header("Location: http://localhost/I_A_Projekt/startbootstrap-business-casual-gh-pages/Admin/Benutzerverwaltung/benutzerverwaltung.php");
die();
?>