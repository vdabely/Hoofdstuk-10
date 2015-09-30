<?php
require_once ("data/10-0.dbconfig.class.php");
require_once ("entities/10-0.genre.class.php");
require_once ("entities/10-0.boek.class.php");

class BoekDAO {
    public static function getAll() {
        $lijst = array();
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT mvc_boeken.id as boekid, titel, genreid, omschrijving FROM mvc_boeken, mvc_genres WHERE genreid = mvc_genres.id ORDER BY titel";
        $resultSet = $dbh->query($sql);
        
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
            array_push($lijst, $boek);
        }
        $dbh = NULL;
        return $lijst;
    }
    public static function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT mvc_boeken.id as boekid, titel, genreid, omschrijving FROM mvc_boeken, mvc_genres WHERE genreid = mvc_genres.id AND mvc_boeken.id = ".$id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh = NULL;
        return $boek;
        
    }
    public static function getByTitel($titel) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "SELECT mvc_boeken.id as boekid, titel, genreid, omschrijving FROM mvc_boeken, mvc_genres WHERE genreid = mvc_genres.id AND titel = '".$titel."'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
       if (!$rij) {
            return null;
        } else {
            $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
            $dbh = NULL;
            return $boek;           
        }
     }
    public static function create($titel, $genreId) {
        $bestaandBoek = self::getByTitel($titel);
        if (isset($bestaandBoek)) throw new TitelBestaatException();
        $sql = "INSERT INTO mvc_boeken (titel, genreid) VALUES ('".$titel."', ".$genreId.")";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $boekId = $dbh->lastInsertId();
        $dbh=NULL;
        $genre = GenreDAO::getById($genreId);
        $boek = Boek::create($boekId, $titel, $genre);
        return boek;
    }
    public static function delete($id) {
        $sql = "DELETE FROM mvc_boeken WHERE id=".$id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
    }
    public static function update($boek) {
        $bestaandBoek = self::getByTitel($boek->getTitel());
        if (isset($bestaandBoek) && $bestaandBoek->getId() != $boek->getId()) throw new TitelBestaatException();
            $sql = "UPDATE mvc_boeken SET titel='".$boek->getTitel()."', genreid=".$boek->getGenre()->getId()." WHERE id=".$boek->getId();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh=NULL;
    }
}
