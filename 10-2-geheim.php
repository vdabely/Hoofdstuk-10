<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location: 10-2-aanmelden.php");
    exit(0);
}
include ("presentation/10-2-geheimeInfo.php");
?>