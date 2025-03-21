<?php

    session_start();

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    require('getapikey.php'); // Téléchargeable depuis CY Bank
    
    $transaction = "154632ABCD"; // Un ID de transaction unique
    $montant = "100.50"; // Montant en euros
    $vendeur = "MI-4_C"; // Ton code vendeur
    $retour = "http://localhost/retour_paiement.php?session=s"; // URL de retour
    
    $api_key = getAPIKey($vendeur);
    $control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");
    

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Accueil - Dunes Seekers</title>
</head>

<body>

    <header>
        <a href="accueil.php"> Dunes Seekers </a>
    </header>

    <nav>
        <ul>
            <li><a href="accueil.php"> Accueil </a></li>
            <li><a href="recherche.php"> Recherche </a></li>
            <?php if(!isset($_SESSION["utilisateur"])): ?>
            <li><a href="connexion.php"> Connectez-vous</a></li>
            <?php endif; ?>
            <li><a href="profil.php"> Mon profil</a></li>
            <li><a href="presentation.php"> A propos de nous </a></li>
            <?php if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]["role"] === "admin"): ?>
            <li><a href="admin.php">Espace Admin</a></li>
        <?php endif; ?>
        </ul>
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

<div class="form_recherche">
<form method="post" action="https://www.plateforme-smc.fr/cybank/index.php">
    <legend class="recherche">Plateforme de paiement</legend>
    
    <!-- Identifiant unique de transaction -->
    <input type="hidden" name="transaction" value="154632ABCD">
    
    <!-- Montant de la transaction -->
    <input type="hidden" name="montant" value="100.50">
    
    <!-- Code vendeur (identifiant de ton groupe) -->
    <input type="hidden" name="vendeur" value="MI-4_C">
    
    <!-- URL de retour après paiement -->
    <input type="hidden" name="retour" value="http://localhost/retour_paiement.php?session=s">
    
    <!-- Valeur de contrôle sécurisée -->
    <input type="hidden" name="control" value="<?= $control ?>">

    <button type="submit">Payer</button>
</form>
    </div>

    