<?php
require_once ("entities/10-0.persoon.class.php");
require_once ("data/10-0.dbconfig.class.php");

class PersoonDAO {
    public static function getAll() {
        $lijst = array();
        $sql = "SELECT familienaam, voornaam FROM personen";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $persoon = new Persoon($rij["familienaam"], $rij["voornaam"]);
            array_push($lijst, $persoon);
        }
        $dbh = NULL;
        return $lijst;
    }
}
