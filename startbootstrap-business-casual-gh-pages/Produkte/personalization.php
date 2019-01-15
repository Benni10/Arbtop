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
            </ul>
        </div>
    </div>
</nav>
<?php
$id = $_POST['id'];
$persText = $_POST['pers_text'];
$textRow = $_POST['row'];
$textHight = $_POST['hight'];

$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("SELECT ID, SourceBack FROM produkt WHERE ID = $id");
if($statement->execute())
{
    while ($row = $statement->fetch())
    {
        echo '<div style="padding: 2em">
                    <div class="card bg-dark text-white">
                    <img class="card-img" src="'. utf8_encode( $row['SourceBack']) .'" alt="Card image">
                        <div class="card-img-overlay">
                            <h5 class="card-title" style="text-align: '. $textRow .'; vertical-align: '. $textHight .';">'. $persText .'</h5>
                        </div>
                    </div>
                </div>';
    }
}
?>

<?php
require ('footer_pro.php');
?>