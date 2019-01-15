<?php
session_start();
require('header_ben.php');
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
                    <a class="nav-link text-expanded" href="../../index.php">Hauptseite</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../../Produkte/produkte.php">Produkte</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../../Warenkorb/warenkorb.php">Warenkorb</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../../Benutzer/profil.php">Dein Profil<a>
                </li>
                <?php
                if($_SESSION['admin'] == 1)
                {
                    ?>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="../admin.php">Adminbereich
                        </a>
                    </li>
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-expanded" href="benutzerverwaltung.php">Zurück
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!--Mein Code-->
<script>
    'use strict';
    function warnung(e) {
        var check = confirm('Wollen Sie diesen Eintrag wirklich löschen?');
        if (check == false) {
            mySubmitFunction(e);
        }
    }

    function mySubmitFunction(e) {
        e.preventDefault();
        return false;
    }
</script>
<?php
if (isset($_POST['id']))
{
   $id = $_POST['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT * FROM benutzer WHERE ID = '$id' ");
    if($statement->execute())
    {
        while ($row = $statement->fetch())
        {
            echo '
                <div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
                    <form method="POST" action="update_Benutzer_func.php" accept-charset="UTF-8">
                        <input type="hidden" name="id" value="'. $id .'">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type = "text" name = "name" value="' . utf8_encode($row['Name']).'"></td>
                            </tr>
                                
                            <tr>
                                <td>Vorname:</td>
                                <td><input type = "text" name = "vorname" value="' . utf8_encode($row['Vorname']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>Email:</td>
                                <td><input type = "email" name = "email" value="' . utf8_encode($row['Email']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>Straße:</td>
                                <td><input type = "text" name = "strasse" value="' . utf8_encode($row['Strasse']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>Hausnummer:</td>
                                <td><input type = "text" name = "hausnummer" value="' . utf8_encode($row['Hausnummer']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>PLZ:</td>
                                <td><input type = "text" name = "plz" value="' . utf8_encode($row['PLZ']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>Ort:</td>
                                <td><input type = "text" name = "ort" value="' . utf8_encode($row['Ort']).'"></td>
                            </tr>
                            
                            <tr>
                                <td>Admin:</td>
                                <td>';
                                    if($row['Administrator'] == 1)
                                    {
                                        echo '<input checked type = "radio" name = "admin" value = "1">Ja 
                                              <input type = "radio" name = "admin" value = "0">Nein';
                                    }
                                    else
                                    {
                                        echo '<input type = "radio" name = "admin" value = "1">Ja 
                                              <input checked type = "radio" name = "admin" value = "0">Nein';
                                    } echo
                                    '</td>
                            </tr>
        
                            <tr>
                                <td>
                                    <div class="intro-button mx-auto">
                                        <input class="btn btn-primary btn-x1" type = "submit" name = "submit" value = "Angaben ändern">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>';
        }
    }
    echo '<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
              <form onsubmit="return warnung(event)" method="POST" action="delete_Benutzer.php" accept-charset="UTF-8">
                <input type="hidden" name="id" value="'. $id .'">
                <p>
                    <div class="intro-button mx-auto">
                        <input class="btn btn-primary btn-xl"  type="submit" name="submit" value="Diesen Benutzer löschen">
                    </div>
                </p>
              </form>
          </div>';
}
?>


<?php
require('footer_ben.php');
?>