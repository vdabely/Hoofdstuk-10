<!doctype HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>10 Meerlagen</title>
    </head>
    <body>
        <h1>Personenlijst</h1>
        <ul>
            <?php 
            foreach ($personen as $persoon) {
                print ("<li>".$persoon->getFamilienaam().", ".$persoon->getVoornaam()."</li>");
            }
            ?>
        </ul>
    </body>
</html>