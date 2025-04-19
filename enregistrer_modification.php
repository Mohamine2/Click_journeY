<?php
session_start();

if (!isset($_SESSION["utilisateur"]) || $_SESSION["utilisateur"]["role"] !== "admin") {
    header("Location: accueil.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
        header("Location: admin.php?page=$page&modif=ok");
        exit;
    }
}

echo "Erreur lors de la modification.";
?>
