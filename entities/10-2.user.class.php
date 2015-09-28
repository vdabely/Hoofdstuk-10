<?php
class User {
    //User aanmaken zodat die opzoekbaar is
    
    private static $idMap = array();
    
    private $id;
    private $login;
    private $paswoord;

    public static function create($id, $login, $paswoord) {

        if (!isset(self::$idMap[$id])) {
            self::$idMap[$id] = new User($id, $login, $paswoord);
        }
        return self::$idMap[$id];
    }

    public function __construct($id, $login, $paswoord) {
        $this->id = $id;
        $this->login = $login;
        $this->paswoord = $paswoord;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPaswoord() {
        return $this->paswoord;
    }
    
}
