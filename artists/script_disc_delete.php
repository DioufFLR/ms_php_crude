<?php
// Contrôle de l'ID (si inexistant ou <= 0, retour à la liste) :
if (!(isset($_GET['id'])) || intval($_GET['id']) <= 0) GOTO TrtRedirection;

// Si la vérification est ok :
require "db.php";
$db = connexionBase();

try {
    // Construction de la requête DELETE sans injection SQL :
    $requete = $db->prepare("DELETE FROM disc WHERE artist_id = ?");
    $requete->execute(array($_GET["id"]));
    $requete->execute();
    $requete->closeCursor();
}
catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_delete.php)");
}

// Si OK: redirection vers la page artists.php
TrtRedirection:
header("Location: discs.php");
exit;