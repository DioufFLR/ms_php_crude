<?php
// Récupération des valeurs :
$id = (isset($_POST['id']) && $_POST['id'] != "") ? $_POST['id'] : Null;
$nom = (isset($_POST['nom']) && $_POST['nom'] != "") ? $_POST['nom'] : Null;
$url = (isset($_POST['url']) && $_POST['url'] != "") ? $_POST['url'] : Null;

// En cas d'erreur, on renvoie vers le formulaire
if ($id == Null) {
    header("Location: artists.php");
}
elseif ($nom == Null || $url == Null) {
    header("Location: artist_form.php?id=".$id);
    exit;
}

// Si la vérification des données est ok :
require "db.php";
$db = connexionBase();

try {
    // Construction de la requête UPDATE sans injection SQL :
    $requete = $db->prepare("UPDATE artist SET artist_name = :nom, artist_url = :url WHERE artist_id = :id;");
    $requete->bindValue(":id", $id, PDO::PARAM_INT);
    $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
    $requete->bindValue(":url", $url, PDO::PARAM_STR);

    $requete->execute();
    $requete->closeCursor();
}

catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_artist_modif.php)");
}

// Si OK: redirection vers la page artist_detail.php
header("Location: artist_detail.php?id=" . $id);
exit;