<?php
    // On se connecte à la BDD via notre fichier db.php :
    require "db.php";
    $db = connexionBase();

    // On récupère l'ID passé en paramètre :
    $id = $_GET["id"];

    // On crée une requête préparée avec condition de recherche :
    $requete = $db->prepare("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id WHERE disc_id=?");
    // on ajoute l'ID du disque passé dans l'URL en paramètre et on exécute :
    $requete->execute(array($id));

    // on récupère le 1e (et seul) résultat :
    $myArtist = $requete->fetch(PDO::FETCH_OBJ);

    // on clôt la requête en BDD
    $requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PDO - Détail</title>
    </head>
    <body>

    <h1>Details</h1>

    <div class="table">
        <table>


            <tr>
                <td><label for="title_for_label">Title</label><br>
                    <input value="<?php echo $myArtist->disc_title; ?>" type="text" name="title" id="title_for_label<?php echo $myArtist->disc_title; ?>"></td>
                <td>Year</td>
                <td>Label</td>
                <td>Artist</td>
                <td>Genre</td>
                <td>Price</td>
            </tr>
        </table>

    </div>

    </body>
</html>