<?php
require_once ("data/10-2.userdao.class.php");

class UserService {
    // Business service class
    public static function controleerGebruiker($login, $paswoord) {
        print ("sreviceclass controleerGebruiker ".$login.", ".$paswoord."<br>");
        $user = UserDAO::getByLogin($login);
        print_r($user); // PRINT
        print("<- &#36;user <br>"); // PRINT
        $pasw = (User::getLogin());
        print ($pasw); // PRINT
        if (isset($user) AND $user->getPaswoord() == $paswoord) {
            print ("Userservice true <br>"); // PRINT
            return TRUE;
        } else {
            print ("Userservice false <br>"); // PRINT
            return FALSE;
        }
    }
}
