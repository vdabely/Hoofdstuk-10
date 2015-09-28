<?php
session_start();
require_once ("business/10-2.userservice.class.php");
if (isset($_GET["action"]) AND $_GET["action"] === "login") {
   $login = UserService::controleerGebruiker($_POST["txtLogin"], $_POST["txtPaswoord"]);
   if ($login) {
       $_SESSION["login"] = TRUE; // Aangemeld blijven voor deze sessie
       header("location: 10-2-geheim.php");
   } else {
       header("location: 10-2-aanmelden.php");
       exit(0);
   }
} else {
    include ("presentation/10-2-loginform.php");
}
?>