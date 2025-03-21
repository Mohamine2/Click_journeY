<?php

    session_start();

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

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
        <form method="post" class="recherche">
            <fieldset method="get" class="recherche">
                <legend class="recherche"> Plateforme de paiement </legend>
                
                <p> Titulaire de la carte: </p>
                <input type="nom" name="nom" id="nom" required /> 
                <br/>

                <br/>
                
                <p>Numéro de carte bancaire :</p>
                <input type="text" id="card-number" name="card-number" pattern="[0-9]{13,19}" placeholder="1234 5678 9012 3456" maxlength="19" required>
                
                <br/>

                <p>Date d'expiration :</p>
                <input type="text" id="expiry" name="expiry" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" placeholder="MM/AA" maxlength="5" required>

                <br/>

                <p>Code de sécurité (CVV) :</p>
                <input type="tel" id="cvv" name="cvv" pattern="[0-9]{3,4}" placeholder="123" maxlength="4" required>

                <br/>

                <button type="submit"> Payer </button>
            </fieldset>
        </form>
    </div>

    