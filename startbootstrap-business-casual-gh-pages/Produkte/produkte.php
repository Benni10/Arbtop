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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="produkte.php">Produkte
                        <span class="sr-only">(current)</span>
                    </a>
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
            </ul>
        </div>
    </div>
</nav>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("SELECT ID, Name, Beschreibung, Preis FROM produkt");
if($statement->execute())
{
    echo '<div class="card-deck">';
    while ($row = $statement->fetch())
    {
        echo '<div class="card" style="width: 20%">
                <img class="card-img-top" src="../img/products-01.jpg" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'. utf8_encode($row['Name']) .'</h5>
                  <p class="card-text">'. utf8_encode($row['Beschreibung']) .'</p>
                  <div style="text-align: center">
                    <p class="card-text">'. $row['Preis'] .'€</p>
                    <form methode="POST" action="einzelProdukt.php">
                        <button name = "submit" value="'. $row['ID'] .'" class="btn btn-primary">Weitere Details</button>  
                    </form>
                  </div>
                </div>
              </div>';
    }
    echo '</div>';
}
?>

<?php
require ('footer_pro.php');
?>
