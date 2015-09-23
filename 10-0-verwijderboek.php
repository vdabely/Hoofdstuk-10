<?php
require_once ("business/10-0.boekservice.class.php");
BoekService::verwijderBoek($_GET["id"]);
header("location: 10-0-toonalleboeken.php");
ewit(0);