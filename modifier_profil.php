<?php
session_start();
header('Content-Type: application/json');

$response = ["succes" => false, "message" => "Une erreur est survenue."];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION["utilisateur"])) {
    // empty pour ne pas autoriser la modification de mail et du numéro
    $nouvel_email = $_SESSION["utilisateur"]["email"];
    $nouveau_numero = $_SESSION["utilisateur"]["numero"];
    $nouveau_nom = !empty($_POST["nom"]) ? $_POST["nom"] : $_SESSION["utilisateur"]["nom"];
    $nouveau_prenom = !empty($_POST["prenom"]) ? $_POST["prenom"] : $_SESSION["utilisateur"]["prenom"];

    $jsonPath = 'donnees/utilisateurs.json';

    if (file_exists($jsonPath)) {
        $utilisateurs = json_decode(file_get_contents($jsonPath), true);
        $email_session = $_SESSION["utilisateur"]["email"];
        $utilisateur_trouve = false;

        // Mettre à jour dans le fichier JSON
        foreach ($utilisateurs as &$utilisateur) {
            if ($utilisateur['email'] === $email_session) {
                $utilisateur["email"] = $nouvel_email;
                $utilisateur["nom"] = $nouveau_nom;
                $utilisateur["prenom"] = $nouveau_prenom;
                $utilisateur["numero"] = $nouveau_numero;
                $utilisateur_trouve = true;

                // Mettre à jour la session
                $_SESSION["utilisateur"] = $utilisateur;

                break;
            }
        }

        if ($utilisateur_trouve) {
            file_put_contents($jsonPath, json_encode($utilisateurs, JSON_PRETTY_PRINT));
            $response["succes"] = true;
            $response["message"] = "Profil mis à jour avec succès.";
        } else {
            $response["message"] = "Utilisateur non trouvé.";
        }
    } else {
        $response["message"] = "Fichier des utilisateurs introuvable.";
    }
}

echo json_encode($response);
?>
