<!doctype HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>10 Boeken</title>
    </head>
    <body>
        <h1>Nieuw Boek Toevoegen</h1>
        <form method="post" action="10-0-voegboektoe.php?action=process">
            <table>
                <tr>
                    <td>Titel:</td>
                    <td><input type="text" name="txtTitel"></td>
                </tr>
                <tr>
                    <td>Genre:</td>
                    <td>
                        <select name="selGenre">
                            <?php foreach ($genreLijst as $genre) { ?>
                            <option value="<?php print($genre->getId()); ?>"><?php print ($genre->getOmschrijving()); ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Toevoegen"></td>
                </tr>
            </table>
        </form>
    </body>
</html>