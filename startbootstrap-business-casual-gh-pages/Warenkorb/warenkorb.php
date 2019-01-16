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
$id = $_SESSION['userid'];

if(isset($id))
{
    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT * FROM warenkorb WHERE Benutzer_ID = '$id' ");

    if ($statement->execute())
    {
        while ($row = $statement->fetch())
        {
            $pId = $row['Produkt_ID'];

            $pPdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

            $pStatement = $pPdo->prepare("SELECT ID, Name, Preis FROM produkt WHERE ID = '$pId' ");

            if ($pStatement->execute())
            {
                while ($pRow = $pStatement->fetch())
                {
                    echo '<form onsubmit="return warnung(event)" method="POST" action="warenkorb_delete_func.php">
                            <input type="hidden" name="id" value="' . utf8_encode($pRow['ID']).'"
                            <label>Name: ' . utf8_encode($pRow['Name']).'</label>
                            <label>Staückpreis: ' . utf8_encode($pRow['Name']).'</label>
                            <input style="width: 3em;" type="number" name="amountInput" min="1" max="50" value="1">
                            <input type="submit" name="delete" value="Aus Warenkorb entfernen">
                          </form>';
                }
            }
        }
    }
}
?>


<?php
require ('footer_war.php');
?>
