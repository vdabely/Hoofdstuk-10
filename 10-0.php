<?php
require_once ("business/10-0.persoonservice.class.php");
$personen = PersoonService::getAllePersonen();
include ("presentation/10-0.personenlijst.php");
