<?php
session_start();
require ('header_war.php');
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
                    <a class="nav-link text-expanded" href="warenkorb.php">Warenkorb
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
            </ul>
        </div>
    </div>
</nav>
<?php
$id = $_SESSION['userid'];

if(isset($id))
{
    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT * FROM warenkorb WHERE Benutzer_ID = '$id' ");

    if ($statement->execute())
    {
        echo '<form method="POST" action="del_or_buy.php">';
        while ($row = $statement->fetch())
        {
            $pId = $row['Produkt_ID'];

            $pPdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

            $pStatement = $pPdo->prepare("SELECT ID, Name, Preis, SourceFront FROM produkt WHERE ID = '$pId' ");

            if ($pStatement->execute())
            {
                while ($pRow = $pStatement->fetch())
                {
                    echo '  <table style="margin-left: 25%; color: white; border-bottom: 2px solid grey; ">
                                <input type="hidden" name="id" value="'. utf8_encode($row['ID']) .'">
                                <input type="hidden" name="pid" value="' . utf8_encode($pRow['ID']) .'">
                                <tr>
                                    <td>Name: </td>
                                    <td>'. utf8_encode($pRow['Name']) .'</td>
                                    <td rowspan="3"><img style="width: 100px;" src="' . utf8_encode($pRow['SourceFront']) .'"></td>
                                </tr>
                                <tr>
                                    <td>Stückpreis: </td>
                                    <td>'. utf8_encode($pRow['Preis']) .'</td>
                                </tr>
                                <tr>
                                    <td>Menge: </td>
                                    <td><input style="width: 3em;" type="number" name="amountInput" min="1" max="50" value="'. utf8_encode($row['Menge']) .'"></td>
                                </tr>
                                <tr>
                                    <td><input class="btn btn-primary btn-x1" type="submit" name="submit" value="Aus Warenkorb entfernen"></td>
                                </tr>
                            </table><br/>';
                }
            }
        }
        if(isset())
        {
            echo '<input class="btn btn-primary btn-x1" style="margin-left: 35%" type="submit" name="submit" value="Kauf abschließen">';
        }
        else
        {
            echo '<p style="color: white;">Dein Warenkorb ist leer</p>';
        }
        echo '</form>';
    }
}
?>


<?php
require ('footer_war.php');
?>
