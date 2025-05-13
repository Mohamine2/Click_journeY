<?php
session_start();

if (!isset($_SESSION["utilisateur"]) || $_SESSION["utilisateur"]["role"] !== "admin") {
    http_response_code(403);
    echo "Accès refusé";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    sleep(2); //simulation latence serveur

    $id = (int)$_POST['id'];
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $role = $_POST['role'];

    $utilisateurs = json_decode(file_get_contents("donnees/utilisateurs.json"), true);

    if ($id >= 0 && $id < count($utilisateurs)) {
        $utilisateurs[$id]['nom'] = $nom;
        $utilisateurs[$id]['prenom'] = $prenom;
        $utilisateurs[$id]['role'] = $role;

        file_put_contents("donnees/utilisateurs.json", json_encode($utilisateurs, JSON_PRETTY_PRINT));

        echo "OK";
        exit;
    } else {
        http_response_code(400);
        echo "ID invalide";
        exit;
    }
}

http_response_code(405);
echo "Méthode non autorisée";
