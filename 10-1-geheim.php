<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: 10-1-aanmelden.php");
    exit(0);
}
include ("presentation/10-1-geheimeInfo.php");
?>