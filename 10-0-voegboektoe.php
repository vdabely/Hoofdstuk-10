<?php
require_once ("business/10-0.genreservice.class.php");
require_once ("business/10-0.boekservice.class.php");
require_once ("exceptions/10-0.titelbestaatexception.class.php");

if ((isset($_GET["action"])) AND ($_GET["action"] == "process")) {
    try {
        BoekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
        header("location: 10-0-toonalleboeken.php");
    } catch (TitelBestaatException $tbe) {
        header("location: 10-0-voegboektoe.php?error=titleexists");
    }
    
} else {
    $genreLijst = GenreService::toonAlleGenres();
    if (isset($_GET["error"])) { $error = $_GET["error"]; } else { $error = ''; }
    include ("presentation/10-0.nieuwboekform.php");
}