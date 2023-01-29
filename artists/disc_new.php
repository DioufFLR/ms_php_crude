<?php
include "db.php";
$db = connexionBase();
$requete = $db->query("SELECT * FROM disc JOIN artist ON disc.artist_id = artist.artist_id");
$tableauD = $requete->fetchAll(PDO::FETCH_OBJ);
$requete->closeCursor();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Ajout disc</title>
</head>
<body>
<h1>Ajouter un vinyle</h1>

    <button><a href="discs.php">Revenir aux discs</a></button>

        <br>
        <br>


    <form action="script_disc_ajout.php" method="post">

        <label for="label_title">Title</label><br>
        <input type="text" name="title" id="label_title" >
        <br>

        <label for="label_artist">Artist</label><br>
        <select name="artist" id="label_artist" class="col-12">
            <option disabled selected>Selectionnez un artiste</option>
            <?php foreach ($tableauD as $disc):?>
                <option value="<?= $disc->artist_id ?>"><?= $disc->artist_name ?></option>
            <?php endforeach; ?>
        </select>

        <br>
        <label for="label_year">Year</label><br>
        <input type="text" name="year" id="label_year" >
        <br>
        <label for="label_genre">Genre</label><br>
        <input type="text" name="genre" id="label_genre">
        <br>
        <label for="label_label">Label</label><br>
        <input type="text" name="label" id="label_label" >
        <br>
        <label for="label_price">Price</label><br>
        <input type="text" name="price" id="label_price" >
        <br>
        <label for="label_picture">Picture</label><br>
        <input type="file" name="picture" id="label_picture">
        <br><br>
        <input type="submit" value="Ajouter">

    </form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>