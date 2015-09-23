<?php
require_once ("business/10-0.boekservice.class.php");
$boekenLijst = BoekService::toonAlleBoeken();
include ("presentation/10-0.boekenlijst.php");