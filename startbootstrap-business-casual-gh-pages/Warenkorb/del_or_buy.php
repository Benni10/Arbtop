<?php
session_start();

$submit = $_POST['submit'];

if($submit == "Aus Warenkorb entfernen") {

    $id = $_POST['id'];
    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("DELETE FROM warenkorb WHERE ID = '$id'");
    $statement->execute(array());

    header("Location: warenkorb.php");
}
else
{
    header("Location: ../Kauf/kaufdaten.php");
}
?>