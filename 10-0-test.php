<?php
require_once ("data/10-0.boekdao.class.php");

$lijst = GenreDAO::getById(1);
print ("<pre>");
print_r($lijst);
print ("</pre>");
?>