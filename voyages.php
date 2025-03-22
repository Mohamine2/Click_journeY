<?php
// Charger le contenu du fichier JSON
$json = file_get_contents('details_voyages.json');
$voyages = json_decode($json, true);

// Vérifier si une destination est spécifiée dans l'URL
$destination = $_GET['dest'];

// Récupérer les données du voyage
$voyage = $voyages[$destination];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title><?= htmlspecialchars($voyage["destination"]) ?></title>
</head>
<body>
    <header>
        <a href="accueil.php">Dunes Seekers</a>
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

    <section class="titre">
        <h1><?= htmlspecialchars($voyage["intro"]) ?></h1>
    </section>

    <section class="onglets">
        <div class="tab-container">
            <?php foreach ($voyage["jours"] as $index => $jour): ?>
                <input type="radio" name="option" id="jour<?= $index + 1 ?>" class="destination" <?= $index === 0 ? 'checked' : '' ?> />
                <label for="jour<?= $index + 1 ?>">
                    <div class="tab-name">Jour <?= $index + 1 ?></div>
                    <div class="tab-content">
                        <h3><?= htmlspecialchars($jour["titre"]) ?></h3>
                        <p><?= htmlspecialchars($jour["desc"]) ?></p>
                    </div>
                </label>
            <?php endforeach; ?>
        </div>
    </section>

    <div class="lieu-contenant">
        <?php foreach ($voyage["images"] as $image): ?>
            <div class="lieu">
                <img src="<?= htmlspecialchars($image["src"]) ?>" alt="<?= htmlspecialchars($image["alt"]) ?>" width="400px" height="300px">
                <h2><?= htmlspecialchars($image["titre"]) ?></h2>
            </div>
        <?php endforeach; ?>
    </div>

    <section class="contact">
        <div class="container">
            <h2>Planifiez votre voyage</h2>
            <p>Obtenez un devis personnalisé pour votre aventure.</p>
            <a href="recapitulatif.php" class="ticket-btn">Réservez un séjour</a>
        </div>
    </section>
</body>
</html>
