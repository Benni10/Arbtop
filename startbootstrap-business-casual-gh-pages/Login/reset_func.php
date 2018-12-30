<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

if(isset($_POST['submit'])) {
    $strasse = $_POST['strasse'];
    $hausnummer = $_POST['hausnummer'];
    $plz = $_POST['plz'];
    $ort = $_POST['ort'];
    $email = $_POST['email'];

    $statement = $pdo->prepare("INSERT INTO benutzer (Strasse, Hausnummer, PLZ, Ort, Admin)VALUES (?, ?, ?, ?, ?)");
    $statement->execute(array($strasse, $hausnummer, $plz, $ort, '0'));
}
?>