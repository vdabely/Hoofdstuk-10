<?php
require_once ("data/10-0.persoondao.class.php");

class PersoonService {
    public static function getAllePersonen() {
        $personen = PersoonDAO::getAll();
        return $personen;
    }
}
