<?php

    session_start();

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    require('getapikey.php'); 

    if (!isset($_SESSION["destination"]) || !isset($_SESSION["prix"]) || !isset($_SESSION["depart"]) || !isset($_SESSION["date_depart"]) || !isset($_SESSION["duree"]) || !isset($_SESSION["transaction"])) {
        die("Erreur : informations du voyage manquantes.");
    }

    $destination = $_SESSION["destination"];
    $montant = number_format((float)$_SESSION["prix"], 2, ".", "");
    $depart = $_SESSION["depart"];
    $date_depart = $_SESSION["date_depart"];
    $duree = $_SESSION["duree"];

    
    $transaction = $_SESSION["transaction"];// Un ID de transaction unique
    $vendeur = "MI-4_C"; // Ton code vendeur
    $retour = "http://localhost/Click_journeY/retour_paiement.php?session=s"; // URL de retour
    
    $api_key = getAPIKey($vendeur);
    $control = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $retour . "#");
    

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <title>Récapitulatif - Dunes Seekers</title>
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
        <input type="search" placeholder="Rechercher...">
    </nav>

    <div class="admin">
    <h1>Récapitulatif du voyage</h1>
    <p><strong>Destination :</strong> <?= htmlspecialchars($destination) ?></p>
    <p><strong>Départ :</strong> <?= htmlspecialchars($depart) ?></p>
    <p><strong>Date de départ :</strong> <?= htmlspecialchars($date_depart) ?></p>
    <p><strong>Durée :</strong> <?= htmlspecialchars($duree) ?></p>
    <p><strong>Prix :</strong> <?= number_format($montant, 2, ",", " ") ?> €</p>


    <form method="post" action="https://www.plateforme-smc.fr/cybank/index.php">
    
    <!-- Identifiant unique de transaction -->
    <input type="hidden" name="transaction" value="<?= htmlspecialchars($transaction) ?>">
    
    <!-- Montant de la transaction -->
    <input type="hidden" name="montant" value="<?= htmlspecialchars($montant) ?>">
    
    <!-- Code vendeur  -->
    <input type="hidden" name="vendeur" value="MI-4_C">
    
    <!-- URL de retour après paiement -->
    <input type="hidden" name="retour" value="http://localhost/Click_journeY/retour_paiement.php?session=s">
    
    <!-- Valeur de contrôle sécurisée -->
    <input type="hidden" name="control" value="<?= $control ?>">

    <button type="submit">Payer</button>
   
    </form>
    </div>
    
</div>