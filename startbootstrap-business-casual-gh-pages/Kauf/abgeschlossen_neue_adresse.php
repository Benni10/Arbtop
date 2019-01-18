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
<?php
if(isset($_POST['submit'])) {
                            $vorname = $_POST['vorname'];
                            $nachname = $_POST['nachname'];
                            $strasse = $_POST['strasse'];
                            $hausnummer = $_POST['hausnummer'];
                            $plz = $_POST['plz'];
                            $ort = $_POST['ort'];

                            foreach($_POST as $key=>$value) {
                                if(empty($_POST[$key])&& $key != "submit") {
                                    $error_message = ucfirst($key)." wird benötigt.";
                                    echo "$error_message<br/>";
                                    break;
                                }
                            }
                        }
                        if(!isset($error_message)) {
                            echo '<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
                                    <p id="kaufabschluss">Der Kauf ist abgeschlossen!</p>
                                <div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
                                    <p>Adresse:<br/>' . $_POST['vorname'] . ' ' . $_POST['nachname'] . '<br/>
                                        ' . $_POST['strasse'] . ' ' . $_POST['hausnummer'] . '<br/>
                                        ' . $_POST['plz'] . ' ' . $_POST['ort'] . '<br/>
                                    </p><p class="message"><a href="../index.php">Zurück zur Hauptseite</a></p></div>
</div>';
                        }
                        ?>
<?php
require ('footer_kau.php');
?>
