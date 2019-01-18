<?php
    session_start();
    require ('header_ben.php');
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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="profil.php">Dein Profil
                        <span class="sr-only">(current)</span>
                    </a>
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
$dbh = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement=$dbh->prepare('SELECT * FROM benutzer WHERE id= ?');
if($statement->execute(array($_SESSION['userid']))){
    while ($row = $statement->fetch()) {
        echo '<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
                    <form method="POST" action="update_Benutzer_func.php" accept-charset="UTF-8">
                        <input type="hidden" name="id" value="'. $_SESSION['userid'] .'">
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
?>

<?php
require ('footer_ben.php');
?>
