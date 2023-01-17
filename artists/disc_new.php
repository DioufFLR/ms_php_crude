<?php
include "db.php";
$db = connexionBase();
$requete = $db->query("SELECT * FROM disc JOIN artist ON artist.artist_id = disc.artist_id;");
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout disc</title>
</head>
<body>
<h1>Ajouter un vinyle</h1>

    <button><a href="discs.php">Revenir aux discs</a></button>

        <br>
        <br>


    <form action="script_disc_ajout.php" method="post" enctype="multipart/form-data">

        <label for="title_for_label">Title</label><br>
        <input type="text" name="title" id="title_for_label" >
        <br>

        <select name="artist" id="artist" class="col-12">
            <option disabled selected>Selectionnez un artiste</option>
            <?php foreach ($tableau as $disc):?>
                <option value="<?=$disc->artist_name?>"><?=$disc->artist_name?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <label for="year_for_label">Year</label><br>
        <input type="text" name="year" id="year_for_label" >
        <br>
        <label for="genre_for_label">Genre</label><br>
        <input type="text" name="genre" id="genre_for_label" >
        <br>
        <label for="label_for_label">Label</label><br>
        <input type="text" name="label" id="label_for_label" >
        <br>
        <label for="price_for_label">Price</label><br>
        <input type="text" name="price" id="price_for_label" >
        <br>
        <label for="fichier_for_label">Picture</label><br>
        <input type="file" name="picture" id="fichier_for_label">

        <input type="submit" value="Ajouter">

        </select>
    </form>

</body>
</html>