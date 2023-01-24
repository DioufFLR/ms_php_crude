<?php
$id = (isset($_POST['id']) && ($_POST['id'] != "")) ? $_POST['id'] : Null;

// S'il n'y a pas eu de redirection vers le formulaire (= si la vérification des données est ok) :
require "db.php";
$db = connexionBase();

try {
    $requete = $db->prepare(/** @lang text */ "DELETE FROM disc WHERE disc_id = :id;");

    $requete->execute(array($id));
}

// Gestion des erreurs
catch (Exception $e) {
    echo "Erreur : " . $requete->errorInfo()[2] . "<br>";
    die("Fin du script (script_disc_ajout.php)");
}

// Si OK: redirection vers la page artists.php
header("Location: discs.php");

// Fermeture du script
exit;