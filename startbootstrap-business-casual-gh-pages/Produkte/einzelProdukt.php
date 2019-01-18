<?php
session_start();
require ('header_pro.php');
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
                    <a class="nav-link text-expanded" href="produkte.php">Produkte</a>
                </li>
                <li class="nav-item px-lg-4">
                    <a class="nav-link text-expanded" href="../Warenkorb/warenkorb.php">Warenkorb</a>
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
                <li class="nav-item active px-lg-4">
                    <a class="nav-link text-expanded" href="produkte.php">Zurück
                        <span class="sr-only">(current)</span>
                    </a>
                    <?php
                    if (isset($_SESSION['userid'])){
                        echo'
<li class="nav-item px-lg-4" style="border-left: 1px solid dimgrey;">
    <a class="nav-link text-expanded" href="../Login/ausgeloggt.php">Ausloggen</a>
</li>';}
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
    $id = $_POST['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=arbtop', 'root', '');

    $statement = $pdo->prepare("SELECT ID, Name, Beschreibung, Kurzbeschreibung, Preis, SourceFront FROM produkt WHERE ID = $id");
    if($statement->execute())
    {
        while ($row = $statement->fetch())
        {
            echo '<div id="Produktbeschreibung" style="padding: 2em">
                    <div class="card mb-3" style="text-align: center; padding: 1em;">
                        <img class="card-img-top" style="border-radius: 1em;" src="'. utf8_encode( $row['SourceFront']) .'" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">'. utf8_encode( $row['Name']) .'</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="card-text">'. utf8_encode( $row['Kurzbeschreibung']) .'</p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">'. utf8_encode( $row['Beschreibung']) .'</p>
                                </li>
                                <li class="list-group-item">
                                    <p class="card-text">'. utf8_encode( $row['Preis']) .' €</p>
                                </li>
                                <li class="list-group-item">
                                    <h5 class="card-title">Schriftzug:</h5>
                                </li>
                                <form method="POST" action="personalization.php">
                                    <input type="hidden" name="id" value="'. utf8_encode($row['ID']) .'">
                                    <li class="list-group-item">
                                        <input type="text" name="pers_text" placeholder="Ihr Schriftzug">
                                    </li>
                                    <li class="list-group-item">
                                        <input type="radio" name="row" value="left" checked>Linksbündig<br/>
                                        <input type="radio" name="row" value="right">Rechtsbündig<br/>
                                        <input type="radio" name="row" value="center">Mittig
                                    </li>
                                    <li class="list-group-item">
                                        <input type="radio" name="hight" value="top" checked>Oben<br/>
                                        <input type="radio" name="hight" value="bottom">Unten<br/>
                                        <input type="radio" name="hight" value="middle">Mittig
                                    </li>
                                    <li class="list-group-item">
                                        <input type="range" name="amountRange" min="4" max="40" value="12" oninput="this.form.amountInput.value=this.value" />
                                        <input style="width: 3em;" type="number" name="amountInput" min="4" max="40" value="12" oninput="this.form.amountRange.value=this.value" />
                                         <select name="fontFamily">
                                            <option value="Arial">Arial</option>
                                            <option value="Helvetica">Helvetica</option>
                                            <option value="Times">Times New Roman</option>
                                            <option value="sans-serif">Sans-serif</option>
                                         </select> 
                                    </li>
                                    <li class="list-group-item">
                                        <input type="submit" name="submit" class="btn btn-primary" value="Schriftzug hinzufügen">
                                    </li>
                                </form>
                            </ul>
                        </div>
                    </div>
                </div>';
        }
    }
?>

<?php
require ('footer_pro.php');
?>
