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

// en haut de page, avec la requête :
//$tableau = $requete->fetchAll(PDO::FETCH_OBJ);
//var_dump($tableau);

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crude discs</title>
</head>
<body>



<table>
    <th><h1>Liste des disques</h1></th>

    <th><button name="ajouter"><a href="disc_new.php">Ajouter</a></button></th>
        <?php foreach ($tableau as $disc): ?>

        <tr>
            <td><img src="/assets/img/<?= $disc -> disc_picture?>" alt="pochette" width="150" height="150"></td>
        </tr>
        <tr>
            <td><?= $disc -> disc_title?></td>
            <td><?= $disc -> artist_name?></td>
            <td><p>Label : <?= $disc -> disc_label ?></p></td>
            <td><p>Year : <?= $disc -> disc_year ?></p></td>
            <td><p>Genre : <?= $disc -> disc_genre ?></p></td>
            <td><a href="disc_detail.php?id=<?= $disc->disc_id ?>">Détail</a></td>
        </tr>

        <?php endforeach; ?>
</table>
</body>
</html>
