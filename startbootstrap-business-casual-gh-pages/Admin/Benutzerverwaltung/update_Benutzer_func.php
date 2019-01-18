<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
$id = utf8_decode($_POST['id']);
$name = utf8_decode($_POST['name']);
$vorname = utf8_decode($_POST['vorname']);
$email = utf8_decode($_POST['email']);
$strasse = utf8_decode($_POST['strasse']);
$hausnummer = utf8_decode($_POST['hausnummer']);
$plz = utf8_decode($_POST['plz']);
$ort = utf8_decode($_POST['ort']);
$admin = utf8_decode($_POST['admin']);


$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("UPDATE benutzer SET Vorname = ?, Name = ?, Email = ?, Strasse = ?, Hausnummer = ?, PLZ = ?, Ort = ?, Administrator = ? WHERE ID = ?");

$statement->execute(array($vorname, $name, $email, $strasse, $hausnummer, $plz, $ort, $admin, $id));

header("Location: benutzerverwaltung.php");

?>



