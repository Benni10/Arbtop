<?php
session_start();
require ('header_pro.php');
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
                    <a class="nav-link text-expanded" href="produkte.php">Produkte</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Warenkorb/warenkorb.php">Warenkorb</a>
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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="produkte.php">Zurück
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
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
$id = $_POST['id'];
$persText = $_POST['pers_text'];
$textRow = $_POST['row'];
$textHight = $_POST['hight'];
$fontSize = $_POST['amountInput'];
$fontFamily = $_POST['fontFamily'];
$bId = $_SESSION['userid'];

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("SELECT ID, SourceBack FROM produkt WHERE ID = $id");
if($statement->execute())
{
    while ($row = $statement->fetch())
    {
        echo '<div style="padding: 2em;">
                    <div class="card bg-dark text-white">
                    <img class="card-img" src="'. utf8_encode( $row['SourceBack']) .'" alt="Card image">
                        <div class="card-img-overlay" style="display: table; height: 85%; width: 100%; ">
                            <h5 style="padding-top: 1em; padding-bottom: 2em; padding-left: 1em; padding-right: 1em; display: table-cell; font-size: '. $fontSize .'pt; text-align: '. $textRow .'; vertical-align: '. $textHight .'; font-family: '. $fontFamily .';">'. $persText .'</h5>
                        </div>
                        <form method="POST" action="add_to_warenkorb.php">
                            <input type="hidden" name="bId" value="'. $bId .'">
                            <input type="hidden" name="pId" value="'. $id .'">
                            <p>
                            <table style="color: white; margin: auto;">
                                <tr>
                                    <td>Menge: </td>
                                    <td><input style="width: 3em;" type="number" name="amountInput" min="1" max="50" value="1"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="intro-button mx-auto">
                                            <input class="btn btn-primary btn-xl" type="submit" name="submit" value="zum Warenkorb hinzufügen">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            </p>                        
                        </form>
                    </div>
                </div>';
    }
}
?>

<?php
require ('footer_pro.php');
?>
