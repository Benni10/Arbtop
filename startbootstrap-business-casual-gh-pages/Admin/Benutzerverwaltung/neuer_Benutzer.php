<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: ../../index.php');
    exit;
}
session_start();
    require('header_ben.php');
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
                            <a class="nav-link text-expanded" href="benutzerverwaltung.php">Zurück
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
<div style="width: 25%; text-align: center; margin: auto; text-decoration: none; color: white; font-family: Arial;">
    <form method = "POST" action = "neuer_Benutzer_func.php" accept-charset="UTF-8">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type = "text" name = "name"></td>
            </tr>

            <tr>
                <td>Vorname:</td>
                <td><input type = "text" name = "vorname"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type = "email" name = "email"></td>
            </tr>

            <tr>
                <td>Straße:</td>
                <td><input type = "text" name = "strasse"></td>
            </tr>

            <tr>
                <td>Hausnummer:</td>
                <td><input type = "text" name = "hausnummer"></td>
            </tr>

            <tr>
                <td>PLZ:</td>
                <td><input type = "text" name = "plz"></td>
            </tr>

            <tr>
                <td>Ort:</td>
                <td><input type = "text" name = "ort"></td>
            </tr>

            <tr>
                <td>Passwort:</td>
                <td><input type = "password" name = "passwort"></td>
            </tr>

            <tr>
                <td>Admin:</td>
                <td><input type = "radio" name = "admin" value = "1">Ja
                <input checked type = "radio" name = "admin" value = "0">Nein</td>
            </tr>

            <tr>
                <td>
                    <div class="intro-button mx-auto">
                        <input class="btn btn-primary btn-x1" type = "submit" name = "submit" value = "Benutzer anlegen">
                    </div>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php
    require('footer_ben.php');
?>