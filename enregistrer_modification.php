<?php
session_start();

if (!isset($_SESSION["utilisateur"]) || $_SESSION["utilisateur"]["role"] !== "admin") {
    echo "Accès refusé";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    sleep(2); // Simulation de latence serveur

    $id = isset($_POST["id"]) ? (int)$_POST["id"] : -1;
    $action = $_POST["action"] ?? "";
    $fichier = "donnees/utilisateurs.json";
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    if ($id < 0 || $id >= count($utilisateurs)) {
        http_response_code(400);
        echo "ID invalide";
        exit;
    }

    if ($action === "supprimer") {
        array_splice($utilisateurs, $id, 1);
        file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
        echo "SUPPRIME";
        exit;
    }

    // Traitement de modification
    $nom = trim($_POST['nom'] ?? '');
    $prenom = trim($_POST['prenom'] ?? '');
    $role = $_POST['role'] ?? '';

    $utilisateurs[$id]['nom'] = $nom;
    $utilisateurs[$id]['prenom'] = $prenom;
    $utilisateurs[$id]['role'] = $role;

    file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
    echo "OK";
    exit;
}

http_response_code(405);
echo "Méthode non autorisée";
