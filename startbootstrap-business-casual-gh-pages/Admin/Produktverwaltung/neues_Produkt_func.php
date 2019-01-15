<?php
session_start();
$name = utf8_decode(nl2br($_POST['name']));
$kurz_besch = utf8_decode(nl2br($_POST['kurzbeschreibung']));
$besch = utf8_decode(nl2br($_POST['beschreibung']));
$preis = utf8_decode(nl2br($_POST['preis']));
$sourceFront = utf8_decode(nl2br($_POST['sourceFront']));
$sourceBack = utf8_decode(nl2br($_POST['sourceBack']));


$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("INSERT INTO produkt VALUES (?, ?, ?, ?, ?, ?, ?)");
$statement->execute(array('', $name, $kurz_besch, $besch, $preis, $sourceFront, $sourceBack));

header("Location: http://localhost/I_A_Projekt/startbootstrap-business-casual-gh-pages/Admin/Produktverwaltung/produktverwaltung.php");
die();
?>