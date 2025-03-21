<?php

session_start(); 

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Infos Admin</title>
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
        <p class="client"> <b>Liste des utilisateurs inscrits:</b></p>
        <p class="client"> Tom Distant / Rang:VIP</p>
        <p class="client"> Yuri Jahad / Rang:Banni</p>
        <p class="client"> Jeanne D'Arc / Rang:Client Occasionnel</p>
        <p class="client"> Satya Robot / Rang:Nouveau Client</p>
        <p class="client"> Ismail Empereur / Rang:VIP</p>
        <button type="submit" class="admin"> Modifier la liste </button>
      </div>
</body>
</html>