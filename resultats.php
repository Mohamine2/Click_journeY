<?php
session_start();

// Charger les données des voyages
$data = json_decode(file_get_contents('voyages.json'), true);

// Récupérer la valeur de la recherche
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Résultats de Recherche</title>
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

    <!-- Affichage des résultats -->
    <?php if ($searchQuery): ?>
        <h2>Résultats de la recherche pour "<?= htmlspecialchars($searchQuery) ?>"</h2>

        <ul>
            <?php foreach ($data as $voyage): ?>
                <li>
                    <?= htmlspecialchars($voyage['depart']) ?></strong> - 
                    <?= htmlspecialchars($voyage['destination']) ?> | 
                    <?= htmlspecialchars($voyage['duree']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>