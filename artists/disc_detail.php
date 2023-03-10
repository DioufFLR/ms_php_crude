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
<script>
    function action()
    {
        const ok = confirm("Etes-vous sûr de vouloir supprimer le disc <?= $myArtist->disc_id ?> ?");
        if (ok)
        {
            alert("Le disc a été supprimé");
            return true;
        }
        else
        {
            alert("Abandon");
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>PDO - Détail</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg bg-dark ps-3">
        <div class="container align-self-center">
            <a class="navbar-brand text-danger" href="#">Détails</a>
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

    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <label class="pb-2" for="title">Titre</label>
                <input class="form-control" placeholder="title" aria-label="title" disabled value="<?= $myArtist->disc_title ?>" type="text" name="title" id="title<?php echo $myArtist->disc_title ?>">
            </div>
            <div class="col mt-5">
                <label class="pb-2"  for="year">Année</label>
                <input class="form-control" placeholder="year" aria-label="year" disabled value="<?= $myArtist->disc_year ?>" type="text" name="year" id="year<?= $myArtist->disc_year ?>">
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <label class="pb-2" for="label">Label</label>
                <input class="form-control" placeholder="label" aria-label="label" disabled value="<?= $myArtist->disc_label ?>" type="text" name="label" id="label<?= $myArtist->disc_label ?>">
            </div>
            <div class="col mt-2">
                <label class="pb-2" for="artist">Artiste</label>
                <input class="form-control" placeholder="artist" aria-label="artist" disabled value="<?= $myArtist->artist_name ?>" type="text" name="artist" id="artist<?= $myArtist->artist_name ?>">
            </div>
        </div>
        <div class="row">
            <div class="col mt-2">
                <label class="pb-2" for="genre">Genre</label>
                <input class="form-control" placeholder="genre" aria-label="genre" disabled value="<?= $myArtist->disc_genre ?>" type="text" name="genre" id="genre<?= $myArtist->disc_genre ?>">
            </div>
            <div class="col mt-2">
                <label class="pb-2" for="price">Prix</label>
                <input class="form-control" placeholder="price" aria-label="price" disabled value="<?= $myArtist->disc_price ?>" type="text" name="price" id="price<?= $myArtist->disc_price ?>">
            </div>
        </div>
        <div class="row col-3 mt-3">
            <label class="pb-2" for="picture">Pochette</label>
            <input type="image" src="/assets/img/<?= $myArtist -> disc_picture?>" alt="Pochette d'album">
        </div>
    </div>

    <div class="container mt-3">
        <a class="link-dark btn btn-danger" href="disc_form.php?id=<?= $myArtist->disc_id ?>">Modifier</a>
        <a class="link-dark btn btn-danger" href="script_disc_delete.php?id=<?=$myArtist->disc_id?>" onclick="return action()">Supprimer</a>
        <a class="link-dark btn btn-danger" href="discs.php">Retour</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>