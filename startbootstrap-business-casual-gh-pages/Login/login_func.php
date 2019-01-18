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
                    <li class="nav-item active px-lg-4">
                        <a class="nav-link text-uppercase text-expanded" href="../index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
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
                    <div id ="register" class="bg-faded rounded p-5">
                        <?php
                        session_start();
                        $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

                        if(isset($_POST['submit'])) {
                            $email = $_POST['email'];
                            $passwort = $_POST['password'];
                            $statement = $pdo->prepare("SELECT * FROM benutzer WHERE Email = ?");
                            $result = $statement->execute(array($email));
                            $user = $statement->fetch();

                            //Überprüfung des Passworts
                            if ($user && password_verify($passwort, $user['Passwort'])) {
                                $_SESSION['userid'] = $user['ID'];
                                $_SESSION['admin'] = $user['Administrator'];
                                die('Login erfolgreich. Weiter zu <a href="../index.php">internen Bereich</a>');
                            } else {
                                $errorMessage = "Email oder Passwort war ungültig";
                                echo $errorMessage;
                            }
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
