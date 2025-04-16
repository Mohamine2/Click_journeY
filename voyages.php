<?php

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Charger le contenu du fichier JSON
session_start();

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

$json = file_get_contents('donnees/details_voyages.json');
$voyages = json_decode($json, true);

// Vérifier si une destination est spécifiée dans l'URL
$destination = $_GET['dest'];

// Récupérer les données du voyage
$voyage = $voyages[$destination];
if (!isset($_SESSION["transaction"])) {
    $_SESSION["transaction"] = bin2hex(random_bytes(12));
}
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
            <li><a href="admin.php"> Espace Admin</a></li>
        <?php endif; ?>
        </ul>
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
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

        <form action="recapitulatif.php?dest=<?= urlencode($destination) ?>" method="post">
            <div class="personnalisation">
                <p><b>Personnalisez le séjour:</b></p>

                <p>Choisissez votre type d'hébergement:</p>
                <select name="hebergement">
                    <option value="Hotel">Hôtel</option>
                    <option value="Maison d'hotes" selected="selected">Maison d'hôtes</option>
                    <option value="Appartement">Appartement</option>
                </select>

                <p>Choix de l'aéroport de départ:</p>
                <select name="aeroport_depart">
                    <option value="Paris" selected="selected">Paris</option>
                    <option value="Marseille">Marseille</option>
                    <option value="Lyon">Lyon</option>
                </select>

                <?php for ($i = 1; $i <= 7; $i++) { ?>
                    <p><u>Jour <?= $i ?> : </u></p>

                    <p>Participation aux activités ?</p>
                    <select name="activites[<?= $i ?>]">
                        <option value="Oui" >Oui</option>
                        <option value="Non" selected="selected">Non</option>
                    </select>

                    <p>Choisissez votre moyen de transport:</p>
                    <select name="transports[<?= $i ?>]">
                        <option value="Autonome" selected="selected">Autonome</option>
                        <option value="navette">Navette collective</option>
                        <option value="taxindiv">Taxis individuels</option>
                    </select>

                    <p>Choisissez votre formule restauration:</p>
                    <select name="restauration[<?= $i ?>]">
                        <option value="Aucune" selected="selected" >Aucune</option>
                        <option value="Demi-pension">Demi-pension</option>
                        <option value="Pension complète">Pension complète</option>
                    </select>
                <?php } ?>

                <p>Choix de l'aéroport de retour:</p>
                <select name="aeroport_retour">
                    <option value="Paris" selected="selected">Paris</option>
                    <option value="Marseille">Marseille</option>
                    <option value="Lyon">Lyon</option>
                </select>
                <br><br>

                <button type="submit" class="ticket-btn">Réservez un séjour</button>
            </div>
        </form>
        </div>
    </section>
</body>
</html>
