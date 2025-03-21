<?php

session_start(); 

// Lire le fichier JSON
$utilisateurs = json_decode(file_get_contents("utilisateurs.json"), true);

// Définir combien d'utilisateurs afficher par page
$utilisateurs_par_page = 5;

// Déterminer la page actuelle
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$page = max(1, $page); // Évite qu'une page négative soit sélectionnée

// Calculer l'index de départ et de fin
$debut = ($page - 1) * $utilisateurs_par_page;
$utilisateurs_affiches = array_slice($utilisateurs, $debut, $utilisateurs_par_page);
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
    <p class="client"><b>Liste des utilisateurs inscrits:</b></p>

    <?php foreach ($utilisateurs_affiches as $user): ?>
        <p class="client"><?= htmlspecialchars($user["nom"] . " " . $user["prenom"]) ?></p>
    <?php endforeach; ?>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>">← Page précédente</a>
        <?php endif; ?>

        <?php if ($debut + $utilisateurs_par_page < count($utilisateurs)): ?>
            <a href="?page=<?= $page + 1 ?>">Page suivante →</a>
        <?php endif; ?>
    </div>

    <button type="submit" class="admin">Modifier la liste</button>
</div>
</div>
</body>
</html>