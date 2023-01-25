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

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disc - delete</title>
</head>
<body>

    <div class="button_delete_delete">

        <form action="script_disc_delete.php" method="post">
            <label for="id_for_label">
                <input hidden type="text" name="id" value="<?= $myArtist->disc_id ?>" id="id_for_label<?= $myArtist->disc_id ?>">
            </label>
            <label for="envoyer_label"></label>
                <input type="button" onclick="confirmation()" value="Delete" id="envoyer_label" name="envoyer_label">
                <script>
                    function confirmation()
                    {
                        if(confirm("Voulez-vous vraiment supprimé le disque <?= $id ?>?")) {
                            alert("Le disque<?= $id ?> a bien été supprimé");
                        }
                    }
                </script>
            <input type="submit">
        </form>

    </div>

</body>
</html>