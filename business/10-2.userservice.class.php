<?php
require_once ("data/10-2.userdao.class.php");

class UserService {
    // Business service class
    public static function controleerGebruiker($login, $paswoord) {
        $user = UserDAO::getByLogin($login);
        if (isset($user) AND $user->getPaswoord() == $paswoord) {
            print ("Userservice true <br>"); // PRINT
            return TRUE;
        } else {
            print ("Userservice false <br>"); // PRINT
            return NULL;
        }
    }
}
