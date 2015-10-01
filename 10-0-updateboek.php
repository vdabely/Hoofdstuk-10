<?php
require_once ("business/10-0.genreservice.class.php");
require_once ("business/10-0.boekservice.class.php");
require_once ("exceptions/10-0.titelbestaatexception.class.php");

if ((isset($_GET["action"])) AND ($_GET["action"] == "process")) {
    try {
        BoekService::updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
        header("location: 10-0-toonalleboeken.php");
        exit(0);
    } catch (TitelBestaatException $tbe) {
        header("location: 10-0-updateboek.php?id=".$_GET["id"]."&error=titleexists");
    }
} else if (isset ($_GET["id"])) {
    $genreLijst = GenreService::toonAlleGenres();
    $boek = BoekService::haalBoekOp($_GET["id"]);
    
    if (isset($_GET["error"])) { $error = $_GET["error"]; } else { $error = ''; }
    include ("presentation/10-0.updateboekform.php");
} else {
    header("location: 10-0-toonalleboeken.php");
}
?>