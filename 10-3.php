<?php
class NegatieveStortingException extends Exception {
    
}
class RekeningVolException extends Exception {
    
}
class TeStortenBedragTeHoogException extends Exception {
    
}
class Rekening {
    private $saldo;
 
    public function __construct() {
        $this->saldo=0;
    }

    public function storten($bedrag) {
        if ($bedrag < 0) throw new NegatieveStortingException();
        if ($bedrag > 501) throw new TeStortenBedragTeHoogException();
        if ($this->saldo + $bedrag > 1000) throw new RekeningVolException();
            $this->saldo += $bedrag;
    }
    
    public function getsaldo() {
        return $this->saldo;
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test exception</title>
    </head>
    <body>
        <?php 
        $rek = new Rekening();
        try {
            print ("<p>Saldo: ".$rek->getsaldo()." &euro;</p>");
            $rek->storten(200);
            $rek->storten(600);
            $rek->storten(300);
            print ("<p>Saldo: ".$rek->getsaldo()." &euro;</p>");
        } catch (NegatieveStortingException $ex) {
            print ("<p>Een negatief bedrag storten is niet mogelijk!</p>");
        } catch (RekeningVolException $ex) {
            print ("<p>Dit bedrag kan niet gestort worden, de limiet is 1000 &euro;!</p>");
        } catch (TeStortenBedragTeHoogException $ex) {
            print ("<p>Dit bedrag kan niet gestort worden, Storting groter dan 500 &euro;!</p>");
        }
        ?>

        </body>
    
</html>