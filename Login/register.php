<?php
require ('header_Log.php');
?>

<!-- Navigation -->
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="../index.php">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="page-section about-heading">
    <div class="container">
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5" id="register">

                        <form action="register_func.php" method="post" class="login-form">
                            <p class="formHeader">Persönliches:</p>
                            <input type="text" name="vorname" placeholder="Vorname"/>
                            <input type="text" name="nachname" placeholder="Nachname"/>
                            <hr/>
                            <p class="formHeader">Adresse:</p>
                            <input type="text" name="strasse" placeholder="Straße"/>
                            <input type="text" name="hausnummer" placeholder="Hausnummer"/>
                            <br/>
                            <input type="text" name="plz" placeholder="PLZ"/>
                            <input type="text" name="ort" placeholder="Ort"/>
                            <hr/>
                            <p class="formHeader">Login-Informationen:</p>
                            <input type="email" name="email" placeholder="E-Mail-Adresse"/>
                            <br/>
                            <input type="password" name="passwort" placeholder="Passwort"/>
                            <input type="password" name="passwortWdh" placeholder="Passwort wiederholen"/>
                            <button name="submit" type="submit">Registrieren</button>
                            <p class="message">Schon im Besitz eines Kontos?
                                <a href="login.php">Hier anmelden</a></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer text-faded text-center py-5">
    <div class="container">
        <p class="m-0 small">ArbTop 2018 ITC Dortmund</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");

    frmvalidator.addValidation("password","req","Please provide a password");

    frmvalidator.addValidation("passwordWdh","req","Please provide a password");
     ]]>
</script>
</body>

</html>