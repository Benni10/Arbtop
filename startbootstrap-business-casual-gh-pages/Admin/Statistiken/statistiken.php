<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
require('header_sta.php');
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
                </ul>
            </div>
        </div>
    </nav>

<!--Hier Programmtext-->
<?php
$pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

$statement = $pdo->prepare("SELECT * FROM statistik");
if($statement->execute())
{
    $Geld = 0;
    while ($row = $statement->fetch())
    {
        $pId = $row['Produkt_ID'];
        $pPdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

        $pStatement = $pPdo->prepare("SELECT ID, Name, Preis, SourceFront FROM produkt WHERE ID = '$pId' ");

        if ($pStatement->execute())
        {
            while ($pRow = $pStatement->fetch())
            {
                $pGesamt = $row['Menge'] * $pRow['Preis'];
                $Geld = $Geld + $pGesamt;
                echo '<table style="margin: auto; border-bottom: 2px solid grey;">
                        <tr>
                            <td>Produkt:</td>
                            <td>'. $pRow['Name'] .'</td>
                            <td rowspan="4"><img style="width: 200px" src="../'. $pRow['SourceFront'] .'"></td>
                        </tr>
                        <tr>
                            <td>Gekauft:</td>
                            <td>'. $row['Menge'] .' mal</td>
                        </tr>
                        <tr>
                            <td>Einzelpreis:</td>
                            <td>'. $pRow['Preis'] .' €</td>
                        </tr>
                        <tr>
                            <td>Verdient an Produkt:</td>
                            <td>'. $pGesamt .' €</td>
                        </tr>
                      </table>';
            }
        }
    }
    echo '<table style="margin: auto;">
                <tr>
                    <td>Umsatz:</td>
                    <td>'. $Geld .' €</td>
                </tr>
            </table>';
}

?>
<?php
require('footer_sta.php');
?>