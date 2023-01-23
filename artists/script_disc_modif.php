<?php
$id = (isset($_POST['id']) && ($_POST['id'] != "")) ? $_POST['id'] : Null;
$title = (isset($_POST['title']) && ($_POST['title'] != "")) ? $_POST['title'] : Null;
$artist = (isset($_POST['artist']) && ($_POST['artist'] != "")) ? $_POST['artist'] : Null;
$year = (isset($_POST['year']) && ($_POST['year'] != "")) ? $_POST['year'] : Null;
$genre = (isset($_POST['genre']) && ($_POST['genre'] != "")) ? $_POST['genre'] : Null;
$label = (isset($_POST['label']) && ($_POST['label'] != "")) ? $_POST['label'] : Null;
$price = (isset($_POST['price']) && ($_POST['price'] != "")) ? $_POST['price'] : Null;
$picture = (isset($_POST['picture']) && ($_POST['picture'] != "")) ? $_POST['picture'] : Null;

if ($id == Null) {
    header("Location: discs.php");
}
elseif ($title == Null || $artist == Null || $year == Null || $genre == Null || $label == Null || $price == Null || $picture == Null)  {
    header("Location: disc_form.php".$id);
    exit;
}

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
require "db.php";
$db = connexionBase();

try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare(/** @lang text */ "UPDATE ");

//    TODO
//    faire requete

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
    $requete->bindValue(":year", $year, PDO::PARAM_INT);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_INT);
    $requete->bindValue(":picture", $picture, PDO::PARAM_STR);

    // Lancement de la requête :
    $requete->execute();

    // Libération de la requête (utile pour lancer d'autres requêtes par la suite) :
    $requete->closeCursor();
}

// Gestion des erreurs
catch (Exception $e) {
    var_dump($requete->queryString);
    var_dump($requete->errorInfo());
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// Si OK: redirection vers la page artists.php
header("Location: discs.php");

// Fermeture du script
exit;