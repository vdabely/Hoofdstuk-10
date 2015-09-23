<?php
require_once ("data/10-0.genredao.class.php");

class GenreService {
    public static function toonAlleGenres() {
        $lijst = GenreDAO::getAll();
        return $lijst;
    }
}
