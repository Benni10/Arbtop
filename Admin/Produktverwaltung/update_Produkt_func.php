<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
$id = $_POST['id'];
$name = utf8_decode(nl2br($_POST['name']));
$kurz_besch = utf8_decode(nl2br($_POST['kurzbeschreibung']));
$besch = utf8_decode(nl2br($_POST['beschreibung']));
$preis = utf8_decode(nl2br($_POST['preis']));
$sourceFront = utf8_decode(nl2br($_POST['sourceFront']));
$sourceBack = utf8_decode(nl2br($_POST['sourceBack']));

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("UPDATE produkt SET Name = ?, Kurzbeschreibung = ?, Beschreibung = ?, Preis = ?, SourceFront = ?, SourceBack = ? WHERE ID = ?");

$statement->execute(array($name, $kurz_besch, $besch, $preis, $sourceFront, $sourceBack, $id));

header("Location: produktverwaltung.php");

?>



