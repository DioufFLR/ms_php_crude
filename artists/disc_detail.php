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

    <h1>Details</h1>

    <div class="table">
        <table>


            <tr>
                <td>
                    <label for="title_for_label">Title</label><br>
                    <input disabled value="<?= $myArtist->disc_title ?>" type="text" name="title" id="title_for_label<?php echo $myArtist->disc_title ?>">
                </td>
                <td>
                    <label for="year_for_label">Year</label><br>
                    <input disabled value="<?= $myArtist->disc_year ?>" type="text" name="year" id="year_for_label<?= $myArtist->disc_year ?>">
                </td>
                <td>
                    <label for="label_for_label">Label</label><br>
                    <input disabled value="<?= $myArtist->disc_label ?>" type="text" name="label" id="label_for_label<?= $myArtist->disc_label ?>">
                </td>
                <td>
                    <label for="artist_for_label">Artist</label><br>
                    <input disabled value="<?= $myArtist->artist_name ?>" type="text" name="artist" id="artist_for_label<?= $myArtist->artist_name ?>">
                </td>
                <td>
                    <label for="genre_for_label">Genre</label><br>
                    <input disabled value="<?= $myArtist->disc_genre ?>" type="text" name="genre" id="genre_for_label <?= $myArtist->disc_label ?>">
                </td>
                <td>
                    <label for="price_for_label">Price</label><br>
                    <input disabled value="<?= $myArtist->disc_price ?>" type="text" name="price" id="price_for_label<?= $myArtist->disc_price ?>">
                </td>
            </tr>
            <tr>
                <td>
                <img src="/assets/img/<?= $myArtist -> disc_picture?>" alt="pochette" width="150" height="150">
                </td>
            </tr>

        </table>
    
        <div class="button">
            <div class="button_update">
                <button><a href="disc_form.php?id=<?= $myArtist->disc_id ?>">Update</a></button>
            </div>
            <div class="button_delete">
                <button><a href="script_disc_delete.php?id=<?=$myArtist->disc_id?>" onclick="return action()">Supprimer</a></button>
            </div>
            <div class="button_back">
                <button><a href="discs.php">Home</a></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>