<?php
session_start();
require_once ("business/10-2.userservice.class.php");
if (isset($_GET["action"]) AND $_GET["action"] === "login") {
    print ("isset action = login <br>"); // PRINT
    print ("gebruiker = ".$_POST["txtLogin"]."<br>"); // PRINT
    print ("paswoord = ".$_POST["txtPaswoord"]."<br>"); // PRINT
   $login = UserService::controleerGebruiker($_POST["txtLogin"], $_POST["txtPaswoord"]);
    print ("usersrevice UserService::controleerGebruiker '".$login."' <br>"); // PRINT
   if ($login) {
       // $_SESSION["login"] = TRUE;
       header("location: 10-2-geheim.php");
   } else {
       header("presentation/location: 10-2-loginform.php");
       exit(0);
   }
} else {
    include ("presentation/10-2-loginform.php");
}
?>