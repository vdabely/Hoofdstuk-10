<?php
session_start();
require_once ("business/10-1.userservice.class.php");
if (isset($_GET["action"]) AND $_GET["action"] === "login") {
   $login = UserService::controleerGebruiker($_POST["txtLogin"], $_POST["txtPaswoord"]);
   if ($login) {
       $_SESSION["login"] = TRUE;
       header("location: 10-1-geheim.php");
   } else {
       header("location: 10-1-loginform.php");
       exit(0);
   }
} else {
    include ("presentation/10-1-loginform.php");
}
?>