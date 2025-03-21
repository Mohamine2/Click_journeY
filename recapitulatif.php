<?php

session_start(); 

if(isset($_POST["paiement"])){
    // Rediriger vers la page de paiement
    header("Location: paiement.php");
    exit();
}
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
        <input type="search" placeholder="Rechercher...">
    </nav>




    <div class="admin">
    <p class="client"><b>Récapitulatif du voyage :</b></p>
    <p class="client">Destination : </p>
    <p class="client">Nombre de voyageurs : </p>
    <p class="client">Etapes du voyage : </p>
    <p class="client">Durée : </p>
    <p class="client">Machin : </p>
    

   
    </div>

    <form method="post">
    <button type="submit" class="admin" name="paiement">Payer</button>
    </form>
</div>