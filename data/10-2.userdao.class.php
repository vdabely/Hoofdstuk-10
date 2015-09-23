<?php
require_once ("entities/10-2.user.class.php");
require_once ("data/dbconfig.class.php"); // DB CONNECTIE

class UserDAO {
    // Data opzoek class
    public static function getByLogin($login) {
        // Geeft gegevens terug die bij login passen.
        $sql = "SELECT id, login, paswoord  FROM gebruikers WHERE login='".$login."'";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $resultSet = $dbh->query($sql);
        // $resultset = opgezochte rij uit DB met SQL
        if ($resultSet) {
            $rij = $resultSet->fetch();
            // $rij is aanspreekbaar gemaakt
            if ($rij) {
                $user = User::create($rij["id"], $rij["login"], $rij["paswoord"]);
                // $user aanmaken 
                $dbh = NULL;
                return $user;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }
}
