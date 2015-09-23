<?php
class UserService {
    public static function controleerGebruiker($login, $paswoord) {
        if (isset($login) AND isset($paswoord) AND $login === "admin" AND $paswoord === "geheim") {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
