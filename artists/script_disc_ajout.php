<?php



// Récupération de l'URL (même traitement, avec une syntaxe abrégée)
$title = (isset($_POST['title']) && ($_POST['title'] != "")) ? $_POST['title'] : Null;
$artist = (isset($_POST['artist']) && ($_POST['artist'] != "")) ? $_POST['artist'] : Null;
$year = (isset($_POST['year']) && ($_POST['year'] != "")) ? $_POST['year'] : Null;
$genre = (isset($_POST['genre']) && ($_POST['genre'] != "")) ? $_POST['genre'] : Null;
$label = (isset($_POST['label']) && ($_POST['label'] != "")) ? $_POST['label'] : Null;
$price = (isset($_POST['price']) && ($_POST['price'] != "")) ? $_POST['price'] : Null;
$picture = (isset($_POST['picture']) && ($_POST['picture'] != "")) ? $_POST['picture'] : Null;

// Travaille img
//if(isset($_FILES['file'])){
//    $tmpName = $_FILES['file']['tmp_name'];
//    $name = $_FILES['file']['name'];
//    $size = $_FILES['file']['size'];
//    $error = $_FILES['file']['error'];
//}
//move_uploaded_file($tmpName,'./upload/'.$name);
//
// vérification de l'extension
//$tabExtension = explode('.', $name);
//$extension = strtolower(end($tabExtension));
//$extensions = ['jpg', 'png', 'jpeg', 'gif'];

//if(in_array($extension, $extensions)){
//    move_uploaded_file($tmpName,'./upload/'.$name);
//}
//else{
//    echo "Mauvaise extension";
//}
//
//Taille max que l'on accepte
$maxSize = 400000;

//if(in_array($extension, $extensions) && $size <= $maxSize){
//    move_uploaded_file($tmpName,'./upload/'.$name);
//}
//else{
//    echo "Mauvaise extension ou taille trop grande";
//}

//// vérif des erreurs
//if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
//    move_uploaded_file($tmpName,'./upload/'.$name);
//}
//else{
//    echo "Une erreur est survenue";
//}̀;

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
    $requete = $db->prepare(/** @lang text */ "INSET INTO disc (disc_title, artist_name, disc_year, disc_genre, disc_label, disc_price, disc_picture) 
    VALUES (:title, :artist, :year, :genre, :label, :price, :picture)");

    // Association des valeurs aux paramètres via bindValue() :
    $requete->bindValue(":title", $title, PDO::PARAM_STR);
    $requete->bindValue(":artist", $artist, PDO::PARAM_STR);
    $requete->bindValue(":year", $year, PDO::PARAM_STR);
    $requete->bindValue(":genre", $genre, PDO::PARAM_STR);
    $requete->bindValue(":label", $label, PDO::PARAM_STR);
    $requete->bindValue(":price", $price, PDO::PARAM_STR);
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