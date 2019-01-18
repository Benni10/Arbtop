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
    <form method = "POST" action = "neues_Produkt_func.php" accept-charset="UTF-8">
        <p>Name:
            <input type = "text" name = "name">
        </p>
        <p>Kurzbeschreibung:
            <textarea style="resize: none;" rows="5" cols="30" name = "kurzbeschreibung"></textarea>
        </p>
        <p>Beschreibung:
            <textarea style="resize: none;" rows="5" cols="30" name = "beschreibung"></textarea>
        </p>
        <p>Preis:
            <input type = "text" name = "preis">
        </p>
        <p>Source Front:
            <input type = "text" name = "sourceFront">
        </p>
        <p>Source Back:
            <input type = "text" name = "sourceBack">
        </p>
        <p>
            <input type = "submit" name = "submit" value = "Anlegen">
        </p>
    </form>

<?php
require('footer_pro.php');
?>