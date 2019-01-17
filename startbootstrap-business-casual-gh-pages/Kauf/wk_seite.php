<?php $adresse = $_POST['adresse'];
if ($adresse == 1){
    header("Location: kaufabschluss.php");
}
else {
    header("Location: ka_neue_adresse.php");
}
?>