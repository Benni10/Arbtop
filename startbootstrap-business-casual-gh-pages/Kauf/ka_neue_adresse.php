<?php
session_start();
require ('header_kau.php');
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
                    <a class="nav-link text-expanded" href="../Warenkorb/warenkorb.php">Warenkorb
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
<div class="content">
<p class="kadaten">Gesamt: </p>
    <form action="abgeschlossen_neue_adresse.php" method="post" class="login-form">
        <p class="kadaten">Neue Adresse:</p>

        <input type="text" name="vorname" placeholder="Vorname"/>
        <input type="text" name="nachname" placeholder="Nachname"/>
        <hr/>
        <input type="text" name="strasse" placeholder="Straße"/>
        <input type="text" name="hausnummer" placeholder="Hausnummer"/>
        <br/>
        <input type="text" name="plz" placeholder="PLZ"/>
        <input type="text" name="ort" placeholder="Ort"/>
        <hr/>
        <button class="btn btn-primary" name="submit" type="submit">An diese Adresse senden</button>
    </form>
</div>
<?php
require ('footer_kau.php');
?>
<script type='text/javascript'>
    <![CDATA[
    var pwdwidget = new PasswordWidget('thepwddiv','password');
    pwdwidget.MakePWDWidget();

    var frmvalidator  = new Validator("register");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("vorname","req","Please provide your name");

    frmvalidator.addValidation("nachname","req","Please provide your name");

    frmvalidator.addValidation("strasse","req","Please provide your name");

    frmvalidator.addValidation("hausnummer","req","Please provide your name");

    frmvalidator.addValidation("plz","req","Please provide your name");

    frmvalidator.addValidation("ort","req","Please provide your name");

    ]]>
</script>