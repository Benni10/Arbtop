<?php
session_start();
$id = $_POST['id'];
$name = nl2br($_POST['name']);
$kurz_besch = nl2br($_POST['kurzbeschreibung']);
$besch = nl2br($_POST['beschreibung']);
$preis = nl2br($_POST['preis']);

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("UPDATE benutzer SET Name = ?, Kurzbeschreibung = ?, Beschreibung = ?, Preis = ? WHERE ID = ?");

$statement->execute(array($name, $kurz_besch, $besch, $preis, $id));

header("Location: http://localhost/I_A_Projekt/startbootstrap-business-casual-gh-pages/Admin/Produktverwaltung/produktverwaltung.php");

?>



