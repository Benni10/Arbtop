<?php
session_start();
require ('header_kau.php');
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../index.php">Hauptseite</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Produkte/produkte.php">Produkte</a>
                </li>
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="../Warenkorb/warenkorb.php">Warenkorb
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Benutzer/profil.php">Dein Profil</a>
                </li>
                <?php
                if($_SESSION['admin'] == 1)
                {
                    ?>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../Admin/admin.php">Adminbereich</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
<p id="kaufabschluss">Der Kauf ist abgeschlossen!</p>
</div>
<?php
$dbh = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement=$dbh->prepare('SELECT * FROM benutzer WHERE id= ?');
if($statement->execute(array($_SESSION['userid']))){
    while ($row = $statement->fetch()) {


        echo '
                <div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
                    <p class="kadaten">Adresse:</p>
                                <td><p>' . utf8_encode($row['Vorname']) . ' ' . utf8_encode($row['Name']) . '<br/>
                                ' . utf8_encode($row['Strasse']) . ' ' . utf8_encode($row['Hausnummer']) . '<br/>
                                ' . utf8_encode($row['PLZ']) . ' ' . utf8_encode($row['Ort']) . '</p></td>
                 <p class="message"><a href="../index.php">Zurück zur Hauptseite</a></p></div>';
    }
}
?>
<?php
require ('footer_kau.php');
?>
