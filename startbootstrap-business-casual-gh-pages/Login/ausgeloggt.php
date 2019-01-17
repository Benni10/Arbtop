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
                        <a class="nav-link text-uppercase text-expanded" href="../Login/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php
session_start();
session_unset();
session_destroy();
?>
    <section class="page-section about-heading">
        <div class="container">
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <p class="message">Sie wurden ausgeloggt. <a href="../Login/login.php">Weiter zum Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
require ('footer_Log.php');
?>