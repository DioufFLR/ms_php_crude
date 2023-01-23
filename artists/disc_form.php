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
$tableauU = $requete->fetch(PDO::FETCH_OBJ);

// on clôt la requête en BDD
$requete->closeCursor();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Modifier</title>
</head>
<body>

<div class="main">
    <h1>Details</h1>

    <div class="table">


            <form action="script_disc_modif.php" method="post">
                <table>
                <tr>
                    <td>
                        <label for="title_for_label">Title</label><br>
                        <input value="<?= $tableauU->disc_title ?>" type="text" name="title" id="title_for_label<?php echo $tableauU->disc_title ?>">
                    </td>
                    <td>
                        <label for="year_for_label">Year</label><br>
                        <input value="<?= $tableauU->disc_year ?>" type="text" name="year" id="year_for_label<?= $tableauU->disc_year ?>">
                    </td>
                    <td>
                        <label for="label_for_label">Label</label><br>
                        <input value="<?= $tableauU->disc_label ?>" type="text" name="label" id="label_for_label<?= $tableauU->disc_label ?>">
                    </td>
                    <td>
                        <label for="artist_for_label">Artist</label><br>
                        <input value="<?= $tableauU->artist_name ?>" type="text" name="artist" id="artist_for_label<?= $tableauU->artist_name ?>">
                    </td>
                    <td>
                        <label for="genre_for_label">Genre</label><br>
                        <input value="<?= $tableauU->disc_genre ?>" type="text" name="genre" id="genre_for_label <?= $tableauU->disc_label ?>">
                    </td>
                    <td>
                        <label for="price_for_label">Price</label><br>
                        <input value="<?= $tableauU->disc_price ?>" type="text" name="price" id="price_for_label<?= $tableauU->disc_price ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="picture_for_label"></label>
                        <input type="file" name="picture" id="picture_for_label">
                        <img src="/assets/img/<?= $tableauU -> disc_picture?>" alt="pochette" width="150" height="150">
                    </td>
                </tr>
            </table>
            </form>


    </div>

    <div class="button">
        <div class="button_update">
            <button><a href="script_disc_modif.php">Modifier</a></button>
        </div>
        <div class="button_back">
            <button><a href="disc_detail.php?id=<?=$tableauU->disc_id?>">Retour</a></button>
        </div>
        <div class="button_back">
            <button><a href="discs.php">Home</a></button>
        </div>
    </div>

</div>
</body>
</html>