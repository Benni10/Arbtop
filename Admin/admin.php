<?php
if(!isset($_SERVER['HTTP_REFERER']))
{
    header('location: ../index.php');
    exit;
}
session_start();
require('header_adm.php');
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
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Warenkorb/warenkorb.php">Warenkorb</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Benutzer/profil.php">Dein Profil<a>
                </li>
                <?php
                if($_SESSION['admin'] == 1)
                {
                    ?>
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-expanded" href="admin.php">Adminbereich
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (isset($_SESSION['userid'])){
                    echo'
<li class="nav-item px-lg-4" style="border-left: 1px solid dimgrey;">
    <a class="nav-link text-expanded" href="../Login/ausgeloggt.php">Ausloggen</a>
</li>';}
                ?>
            </ul>
        </div>
    </div>
</nav>

    <!--Hier Programmtext-->
<div style=" text-align: center; margin-left: 30%; margin-bottom: 10%; text-decoration: none; color: white; font-family: Arial;">
    <div class="intro-button mx-auto" style="float: left; margin-top: 30px; margin-bottom: 30px">
        <a class="btn btn-primary btn-xl" href="Produktverwaltung/produktverwaltung.php">Produktverwaltung</a>
    </div>

    <div class="intro-button mx-auto" style="float: left; margin-top: 30px; margin-bottom: 30px">
        <a class="btn btn-primary btn-xl" href="Benutzerverwaltung/benutzerverwaltung.php">Benutzerverwaltung</a>
    </div>

    <div class="intro-button mx-auto" style="float: left; margin-top: 30px; margin-bottom: 30px">
        <a class="btn btn-primary btn-xl" href="Statistiken/statistiken.php">Statistiken</a>
    </div>
</div>


<?php
require('footer_adm.php');
?>
