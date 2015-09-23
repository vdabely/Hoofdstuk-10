<?php
require_once ("data/10-0.dbconfig.class.php");
require_once ("entities/10-0.genre.class.php");

class GenreDAO {
    public static function getAll() {
        $lijst = array();
        
        $sql = "SELECT id, omschrijving FROM mvc_genres";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["id"], $rij["omschrijving"]);
            array_push($lijst, $genre);
        }
        $dbh = NULL;
        return $lijst;
    }
    public static function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT omschrijving FROM mvc_genres WHERE id = ".$id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($id, $rij["omschrijving"]);
        $dbh = NULL;
        return $genre;
        
    }

}
