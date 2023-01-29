<?php

// on importe le contenu du fichier "db.php"
include "db.php";
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();
// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT * FROM disc JOIN artist on artist.artist_id = disc.artist_id");
// on récupère tous les résultats trouvés dans une variable
$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
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
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Crude discs</title>
</head>
<body>

    <div class="container">
        <h1>Liste des disques</h1>

        <button name="ajouter"><a href="disc_new.php">Ajouter</a></button>
        <button name="page_artists"><a href="artists.php">Artists</a></button>

        <div class="card-group border-0 mb-3" style="max-width: 540px;">
            <?php foreach ($tableau as $disc): ?>
            <div class="col-6">
                <div class="row g-0">

                        <div class="col-md-4">
                            <img src="/assets/img/<?= $disc -> disc_picture?>" alt="pochette" class="rounded floated-start" width="200px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $disc -> disc_title?></h5>
                                <p class="card-text"><?= $disc -> artist_name?><br>
                                    <span class="fw-bold">Label :</span><?= $disc -> disc_label ?><br>
                                    <span class="fw-bold">Year :</span><?= $disc -> disc_year ?><br>
                                    <span class="fw-bold">Genre :</span><?= $disc -> disc_genre ?></p>
                                <a href="disc_detail.php?id=<?= $disc->disc_id ?>" class="btn btn-info">Détail</a>
                            </div>
                        </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
