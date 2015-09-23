<?php
require_once ("business/10-0.genreservice.class.php");
require_once ("business/10-0.boekservice.class.php");

if ((isset($_GET["action"])) AND ($_GET["action"] == "process")) {
    BoekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: 10-0-toonalleboeken.php");
    exit(0);    
} else {
    $genreLijst = GenreService::toonAlleGenres();
    include ("presentation/10-0.nieuwboekform.php");
}