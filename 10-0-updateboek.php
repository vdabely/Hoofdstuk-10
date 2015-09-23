<?php
require_once ("business/10-0.genreservice.class.php");
require_once ("business/10-0.boekservice.class.php");
if ((isset($_GET["action"])) AND ($_GET["action"] == "process")) {
    BoekService::updateBoek($_GET["id"], $_POST["txtTitel"], $_POST["selGenre"]);
    header("location: 10-0-toonalleboeken.php");
    exit(0);
}else {
    $genreLijst = GenreService::toonAlleGenres();
    $boek = BoekService::haalBoekOp($_GET["id"]);
    include ("presentation/10-0.updateboekform.php");
}
?>