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

        <label for="title">Title</label><br>
        <input type="text" name="title" id="title" >
        <br>

        <select name="artist" id="artist" class="col-12">
            <option disabled selected>Selectionnez un artiste</option>
            <?php foreach ($tableau as $disc):?>
                <option value="<?=$disc->artist_id?>"><?=$disc->artist_name?></option>
            <?php endforeach; ?>
        </select>

        <br><br>
        <label for="year">Year</label><br>
        <input type="text" name="year" id="year" >
        <br>
        <label for="genre">Genre</label><br>
        <input type="text" name="genre" id="genre" >
        <br>
        <label for="label">Label</label><br>
        <input type="text" name="label" id="label" >
        <br>
        <label for="price">Price</label><br>
        <input type="text" name="price" id="price" >
        <br>
        <label for="picture">Picture</label><br>
        <input type="file" name="picture" id="picture">

        <input type="submit" value="Ajouter">

    </form>

</body>
</html>