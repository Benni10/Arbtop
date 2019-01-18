<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
require('header_pro.php');
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
                            <a class="nav-link text-expanded" href="../admin.php">Zurück
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
    <a class="nav-link text-expanded" href="../../Login/ausgeloggt.php">Ausloggen</a>
</li>';}
                    ?>
                </ul>
            </div>
        </div>
    </nav>

<!--Hier Programmtext-->
<?php
echo '<table style="margin-left: auto; margin-right: auto">';
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("SELECT ID, Name FROM produkt");
if($statement->execute())
{
    while ($row = $statement->fetch())
    {
        echo '
                <form method="POST" action="update_Produkt.php" accept-charset="UTF-8">
                    <input type="hidden" name="id" value="'. utf8_encode($row['ID']) .'">
                    <tr>
                        <td><input class="btn btn-primary btn-x1" type="submit" name="submit" value="'. utf8_encode($row['Name']) .'"></td>
                    </tr>   
                </form>';
    }
}

echo '  <tr>
            <td>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                <div class="intro-button mx-auto" style="margin: auto">
                    <a class="btn btn-primary btn-xl"  href="neues_Produkt.php">Neues Produkt anlegen</a>
                </div>
            </td>
        </tr>
    </table>';

require('footer_pro.php');
?>