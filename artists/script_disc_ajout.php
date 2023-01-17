<?php
//
//
//if (isset($_POST['title']) && $_POST['title'] != "") {
//    $title = $_POST['title'];
//} else {
//    $title = null;
//}
//if (isset($_POST['artist']) && $_POST['artist'] != "") {
//    $artist = $_POST['artist'];
//} else {
//    $artist = null;
//}
//if (isset($_POST['year']) && $_POST['year'] != "") {
//    $year = $_POST['year'];
//} else {
//    $year = null;
//}
//if (isset($_POST['genre']) && $_POST['genre'] != "") {
//    $genre = $_POST['genre'];
//} else {
//    $genre = null;
//}
//if (isset($_POST['label']) && $_POST['label'] != "") {
//    $label = $_POST['label'];
//} else {
//    $label = null;
//}
//if (isset($_POST['price']) && $_POST['price'] != "") {
//    $price = $_POST['price'];
//} else {
//    $price = null;
//}
//if (isset($_POST['picture']) && $_POST['picture'] != "") {
//    $picture = $_POST['picture'];
//}
//else {
//
//    $picture = null;
//}


// Récupération de l'URL (même traitement, avec une syntaxe abrégée)
$title = (isset($_POST['title']) && ($_POST['title'] != "")) ? $_POST['title'] : Null;
$artist = (isset($_POST['artist']) && ($_POST['artist'] != "")) ? $_POST['artist'] : Null;
$year = (isset($_POST['year']) && ($_POST['year'] != "")) ? $_POST['year'] : Null;
$genre = (isset($_POST['genre']) && ($_POST['genre'] != "")) ? $_POST['genre'] : Null;
$label = (isset($_POST['label']) && ($_POST['label'] != "")) ? $_POST['label'] : Null;
$price = (isset($_POST['price']) && ($_POST['price'] != "")) ? $_POST['price'] : Null;
$picture = (isset($_POST['picture']) && ($_POST['picture'] != "")) ? $_POST['picture'] : Null;



// En cas d'erreur, on renvoie vers le formulaire
if ($title == Null ||  $year == Null ||$artist == Null || $genre == Null || $label == Null || $price == Null || $picture == Null) {
    header("Location: disc_new.php");
    exit;
}

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
require "db.php";
$db = connexionBase();

try {
    // Construction de la requête INSERT sans injection SQL :
    $requete = $db->prepare(/** @lang text */ "INSERT INTO disc (disc.disc_title, disc.disc_year, disc.disc_genre, disc.disc_label, disc.disc_price, disc.disc_picture) VALUES (:title, :year, :genre, :label, :price, :picture);
                                                      INSERT INTO artist ( artist.artist_name) VALUES (:artist)");
//    $requete2 = $db->prepare("INSERT INTO artist (artist_name) VALUES (:artist);");

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
    $requete->bindValue(":year", $year, PDO::PARAM_STR);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_STR);
    $requete->bindValue(":picture", $price, PDO::PARAM_STR);

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