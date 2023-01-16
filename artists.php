<?php

// on importe le contenu du fichier "db.php"
include "db.php";
// on exécute la méthode de connexion à notre BDD
$db = connexionBase();

// on lance une requête pour chercher toutes les fiches d'artistes
$requete = $db->query("SELECT * FROM artist");
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
    <title>PDO</title>
</head>
<body>


    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <!-- Ici, on ajoute une colonne pour insérer un lien -->
            <th></th>
        </tr>

        <?php foreach ($tableau as $artist): ?>
            <tr>
                <td><?= $artist->artist_id ?></td>
                <td><?= $artist->artist_name ?></td>
                <!-- Ici, on ajoute un lien par artiste pour accéder à sa fiche : -->
                <td><a href="artist_detail.php?id=<?= $artist->artist_id ?>">Détail</a></td>
            </tr>
        <?php endforeach; ?>

    </table>


</body>
</html>

