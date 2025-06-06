<?php

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Charger le contenu du fichier JSON
session_start();

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

$json = file_get_contents('donnees/details_voyages.json');
$details_voyages = json_decode($json, true);

// Vérifier si une destination est spécifiée dans l'URL
$destination = $_GET['dest'];

// Récupérer les données du voyage
$voyage = $details_voyages[$destination];

$json2 = file_get_contents('donnees/voyages.json');
$info_voyages = json_decode($json2, true);

// Récupérer les données du voyage
foreach($info_voyages as $info){
    if($info['destination'] == $destination){
        $voyage2 = $info['prix'];
        $jours = $info['duree'];
        break;
    }
}

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
    <nav>
        <ul>
        <li class="logo">
            <a href="accueil.php">
                <img src="images/logov2.png" alt="Logo Dunes Seekers">
            </a>
        </li>
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
                <input type="hidden" id="duree" value="<?=htmlspecialchars($jours)?>"> 
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

                <input type="number" name="adultes" id="adultes" min="1" value="1" required> Adulte(s)    </input>
                <input type="number" name="enfants" id="enfants" min="0" value="0" required> Enfant(s)    </input> 

                <p>Choisissez votre type d'hébergement:</p>
                <select name="hebergement" id="hebergement">
                </select>

                <p>Choix de l'aéroport de départ:</p>
                <select name="aeroport_depart" id="aeroport_depart">

                </select>

                <?php for ($i = 1; $i <= $jours; $i++) { ?>
                    <p><h3>Jour <?= $i ?> : </h3></p>

                    <p>Participation aux activités ?</p>
                    <select name="activites[<?= $i ?>]" id="activites_<?= $i ?>">

                    </select>

                    <p>Choisissez votre moyen de transport:</p>
                    <select name="transports[<?= $i ?>]" id="transports_<?= $i ?>">
            
                    </select>

                    <p>Choisissez votre formule restauration:</p>
                    <select name="restauration[<?= $i ?>]" id="restauration_<?= $i ?>">
                        
                    </select>
                <?php } ?>

                <p>Choix de l'aéroport de retour:</p>
                <select name="aeroport_retour" id="aeroport_retour">
                    
                </select>
                <br><br>

                <h1 id="prix-affichage" >Prix: <?= htmlspecialchars($voyage2) ?> € </h1>
                <input type="hidden" id="prix_affiche" name="prix" value="<?= htmlspecialchars($voyage2) ?>">
                <input type="hidden" id="prix-base" value="<?= htmlspecialchars($voyage2) ?>">
                <br><br>

                <button type="submit" class="ticket-btn">Réservez un séjour</button>
            </div>
        </form>
        </div>
    </section>
    <script src="prix.js"></script>

    <footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>

    <script src="options.js"></script>
    <script src="mode_sombre.js"></script>
</body>
</html>
