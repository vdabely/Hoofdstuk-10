<?php
require_once ("data/10-2.userdao.class.php");

class UserService {
    // Business service class
    public static function controleerGebruiker($login, $paswoord) {
        $user = UserDAO::getByLogin($login);
        print_r($user);
        $log = User::getLogin();
//        print ($log); // PRINT
        $pasw = User::getPaswoord();
//        print ($pasw); // PRINT
        if (isset($user) AND $user->getPaswoord() == $paswoord) {
//            print ("Userservice true <br>"); // PRINT
            return TRUE;
        } else {
//            print ("Userservice false <br>"); // PRINT
            return FALSE;
        }
    }
}
