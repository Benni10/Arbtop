<?php
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
                            <a class="nav-link text-expanded" href="produktverwaltung.php">Zurück
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
<?php
if (isset($_POST['id']))
{
    $id = $_POST['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT * FROM produkt WHERE ID = '$id' ");
    if($statement->execute())
    {
        while ($row = $statement->fetch())
        {
            echo '
                <form method="POST" action="update_Produkt_func.php" accept-charset="UTF-8">
                    <input type="hidden" name="id" value="'. $id .'">

                    <p>Name:
                        <input type = "text" name = "name" value="' . utf8_encode($row['Name']).'">
                    </p>

                    <p>Kurzbeschreibung:
                        <textarea style="resize: none;" rows="5" cols="30" name = "kurzbeschreibung">' . utf8_encode($row['Kurzbeschreibung']).'</textarea>
                    </p>

                    <p>Beschreibung:
                        <textarea style="resize: none;" rows="5" cols="30" name = "beschreibung">' . utf8_encode($row['Beschreibung']).'</textarea>
                    </p>

                    <p>Preis:
                        <input type = "text" name = "preis" value="' . utf8_encode($row['Preis']).'">
                    </p>

                    <p>
                        <div class="intro-button mx-auto">
                            <input class="btn btn-primary btn-x1" type = "submit" name = "submit" value = "Angaben ändern">
                        </div>
                    </p>
                </form>';
        }
    }
    echo '<form method="POST" action="delete_Produkt.php" accept-charset="UTF-8">
            <input type="hidden" name="id" value="'. $id .'">
            <p>
                <div class="intro-button mx-auto">
                    <input class="btn btn-primary btn-xl"  type="submit" name="submit" value="Dieses Produkt löschen">
                </div>
            </p>
          </form>';
}
?>


<?php
require('footer_pro.php');
?>