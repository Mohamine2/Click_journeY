<?php
session_start();  // Toujours démarrer la session

// on vérifie que l'utilisateur est en ligne
if (!isset($_SESSION["utilisateur"])) {
    echo json_encode(["success" => false, "message" => "Utilisateur pas connecté"]);
    exit;
}

// on vérifie si la destination est présente 
if (!isset($_POST["destination"]) || empty($_POST["destination"])) {
    echo json_encode(['success' => false, 'message' => "Destination manquante/indisponible"]);
    exit;
}

// on récupère les données
$utilisateur = $_SESSION['utilisateur']['email'];
$destination = $_POST['destination'];
$montant = $_POST['montant'];

// Fichier JSON où les commandes sont stockées
$fichier = "donnees/panier.json";
$panier = [];

// Récupérer les données existantes
$panier = [];
if (file_exists($fichier)) {
    $json_data = file_get_contents($fichier);
    $panier = json_decode($json_data, true) ?? []; // Décoder en tableau associatif
}

// nouveau panier
$panier1 = [
    "email" => $utilisateur,
    "destination" => $destination,
    "prix" => $montant,
    "date_ajout" => date('Y-m-d H:i:s')
];

//ajout du nouveau panier
$panier[] = $panier1;

// Sauvegarder dans le fichier JSON
file_put_contents($fichier, json_encode($panier, JSON_PRETTY_PRINT));
        
header('Content-Type: application/json');
echo json_encode(["success" => true, "message" => "Le formulaire de ce voyage a été ajouté au panier."]);

?>