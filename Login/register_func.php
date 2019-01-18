<?php
require ('header_Log.php');
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="../index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-uppercase text-expanded" href="../about.php">About</a>
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
                        <?php
                        session_start();

                        if(isset($_POST['submit'])) {
                            $vorname = $_POST['vorname'];
                            $nachname = $_POST['nachname'];
                            $strasse = $_POST['strasse'];
                            $hausnummer = $_POST['hausnummer'];
                            $plz = $_POST['plz'];
                            $ort = $_POST['ort'];
                            $email = $_POST['email'];
                            $passwort = $_POST['passwort'];
                            $passwortWdh = $_POST['passwort'];

                            foreach($_POST as $key=>$value) {
                                if(empty($_POST[$key])&& $key != "submit") {
                                    $error_message = ucfirst($key)." wird benötigt.";
                                    echo "$error_message<br/>";
                                    break;
                                }
                            }
                            if(!$passwort == $passwortWdh){
                                $error_message = "Ungleiche Passwörter.<br>";
                                echo "$error_message<br/>";
                            }
                            if(!isset($error_message)) {
                                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                                    $error_message = "Ungültige E-Mail-Adresse";
                                    echo "$error_message<br/>";
                                }
                            }
                        }

                        if(!isset($error_message)) {
                            $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');
                            $passwortH = password_hash($passwort, PASSWORD_DEFAULT);
                            $statement = $pdo->prepare("INSERT INTO benutzer VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $statement->execute(array('', $vorname, $nachname, $email, $strasse, $hausnummer, $plz, $ort, $passwortH, '0'));
                            echo "Registrierung erfolgreich!";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require ('footer_Log.php');
?>