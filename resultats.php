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

    <div class="voyage-container">
        <?php foreach ($data as $voyage): ?>
            
                <div class="voyage-icone">
                    <img src="<?= htmlspecialchars($voyage['image']) ?>" alt="<?= htmlspecialchars($voyage['destination']) ?>" class="voyage-image">
                    <div class="voyage-info">
                        <h3><?= htmlspecialchars($voyage['destination']) ?></h3>
                        <p><strong>Départ :</strong> <?= htmlspecialchars($voyage['depart']) ?></p>
                        <p><strong>Durée :</strong> <?= htmlspecialchars($voyage['duree']) ?></p>
                        <p><strong>Prix :</strong> <?= htmlspecialchars($voyage['prix']) ?> €</p>
                        <a href="voyages.php?dest=<?= urlencode($voyage['destination']) ?>" class="voyage-link">Voir plus</a>
                    </div>
                </div>
            
        <?php endforeach; ?>
    </div>
<?php endif; ?>


    
</body>
</html>