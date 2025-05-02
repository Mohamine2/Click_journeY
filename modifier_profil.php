<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_SESSION["utilisateur"])) {
        $nouvel_email = $_POST["email"] ?? $_SESSION["utilisateur"]["email"];
        $nouveau_nom = $_POST["nom"] ?? $_SESSION["utilisateur"]["nom"];
        $nouveau_prenom = $_POST["prenom"] ?? $_SESSION["utilisateur"]["prenom"];
        $nouveau_numero = $_POST["numero"] ?? $_SESSION["utilisateur"]["numero"];


        // Mettre à jour la session
        $_SESSION["utilisateur"]["nom"] = $nouveau_nom;
        $_SESSION["utilisateur"]["prenom"] = $nouveau_prenom;
        $utilisateur["numero"] = $nouveau_numero;


        // Mettre à jour dans le fichier JSON
        $jsonPath = 'donnees/utilisateurs.json'; // Chemin vers ton fichier
        if (file_exists($jsonPath)) {
            $utilisateurs = json_decode(file_get_contents($jsonPath), true);

            foreach ($utilisateurs as &$utilisateur) {
                if ($utilisateur['email'] === $_SESSION["utilisateur"]["email"]) {
                    $utilisateur["email"] = $nouvel_email;
                    $utilisateur["nom"] = $nouveau_nom;
                    $utilisateur["prenom"] = $nouveau_prenom;
                    $utilisateur["numero"] = $nouveau_numero;
                    break;
                }
            }

            file_put_contents($jsonPath, json_encode($utilisateurs, JSON_PRETTY_PRINT));
        }
    }

    header("Location: profil.php");
    exit();
} else {
    echo "Méthode non autorisée.";
}

