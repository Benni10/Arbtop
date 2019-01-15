<?php
require ('header.php');
session_start();
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
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-expanded" href="index.php">Hauptseite
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="Produkte/produkte.php">Produkte</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="Warenkorb/warenkorb.php">Warenkorb</a>
                    </li>
                    <li class="nav-item px-lg-4">
                        <a class="nav-link text-expanded" href="Benutzer/profil.php">Dein Profil</a>
                    </li>
                    <?php
                    if($_SESSION['admin'] == 1)
                    {
                        ?>
                        <li class="nav-item px-lg-4">
                            <a class="nav-link text-expanded" href="Admin/admin.php">Adminbereich</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="Werbetext">

        <p id="Werbefragen">
            Sie möchten, dass Ihre Mitarbeiter nicht nur mit ihrem Laptop arbeiten, sondern diesen auch mit Ihrer Firma identifizieren? </br>
            Sie möchten, dass bei externen Veranstaltungen, Schulungen, Beratungen und vielem mehr die Kunden Ihren Firmennamen in positiver Erinnerung behalten?</br></br>
            Dann sind Sie bei „ArbTop“ genau richtig!
        </p>
        <p id="Werbung">
         "ArbTop" verbindet Arbeit und Laptop optisch miteinander.
        Sie können aus den verschiedenen Modellen den passenden Firmenlaptop auswählen und diesen dann mit einem Aufdruck des Firmennamens bestellen.
        Die angebotenen Laptopmodelle sind extra auf verschiedene Firmenschwerpunkte ausgelegt und sind somit die perfekte Ergänzung für Ihre Mitarbeiter.
        Ihre Mitarbeiter werden einen ganz neuen Bezug zu dem vorher so langweiligem Arbeitsgerät haben.</br></br>
        Denn dank "ArbTop" wird aus dem schnöden Laptop ein schicker Firmenlaptop auf den Sie und ihre Mitarbeiter stolz sein können!
        </p>
    </div>

<?php
require ('footer.php');
?>