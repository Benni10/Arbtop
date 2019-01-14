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

    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT ID, Name, Beschreibung, Kurzbeschreibung, Preis FROM produkt WHERE ID = $id");
    if($statement->execute())
    {
        while ($row = $statement->fetch())
        {
            echo '<div style="padding: 2em">
                    <div class="card mb-3" style="text-align: center; padding: 1em;">
                        <img class="card-img-top" style="border-radius: 1em;" src="../img/products-02.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'. utf8_encode( $row['Name']) .'</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="card-text">'. utf8_encode( $row['Kurzbeschreibung']) .'</p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">'. utf8_encode( $row['Beschreibung']) .'</p>
                                </li>
                            </ul>
                            <p class="card-text">'. utf8_encode( $row['Preis']) .' €</p>
                        </div>
                    </div>
                </div>';
        }
    }
?>

<?php
require ('footer_pro.php');
?>
