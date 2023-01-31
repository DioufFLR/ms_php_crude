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

    <nav class="navbar navbar-expand-lg bg-dark ps-3">
        <div class="container align-self-center">
            <a class="navbar-brand text-danger" href="#">Ajouter un vinyle</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="artists.php">Artistes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="discs.php">Disques</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container pt-3">
        <form action="script_disc_ajout.php" method="post">
            <div class="row">
                <label for="label_title">Titre</label><br>
                <input type="text" name="title" placeholder="titre" id="label_title" >
            </div>
            <div class="row mt-2">
                <label for="label_artist">Artiste</label><br>
                <select name="artist" id="label_artist" class="col-12">
                    <option disabled selected>Selectionnez un artiste</option>
                    <?php foreach ($tableauD as $disc):?>
                        <option value="<?= $disc->artist_id ?>"><?= $disc->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="row mt-2">
                <label for="label_year">Année</label><br>
                <input type="text" name="year" placeholder="année" id="label_year" >
            </div>
            <div class="row mt-2">
                <label for="label_genre">Genre</label><br>
                <input type="text" name="genre" placeholder="genre" id="label_genre">
            </div>
            <div class="row mt-2">
                <label for="label_label">Label</label><br>
                <input type="text" name="label" placeholder="label" id="label_label" >
            </div>
            <div class="row mt-2">
                <label for="label_price">Prix</label><br>
                <input type="text" name="price" placeholder="prix" id="label_price" >
            </div>
            <div class="row mt-2">
                <label for="label_picture">Pochette</label><br>
                <input type="file" name="picture" id="label_picture">
            </div>
            <div class="col-1 mt-5">
                <input type="submit" class="btn btn-success" value="Ajouter">
            </div>

        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>