<?php

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    session_start();

    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION["utilisateur"])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: connexion.php");
    exit();
    }

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

    // Charger les données des voyages
    $voyages = json_decode(file_get_contents('donnees/voyages.json'), true);

    require('getapikey.php');
    require('fonctions_voyages.php');

    $destination = $_GET['dest'];
    // Rechercher le voyage
    foreach ($voyages as $voyage) {
        if ($voyage["destination"] == $destination) {
            $date_depart=$voyage['date_depart'];
            $duree=$voyage['duree'];
            $prix_base=$voyage['prix'];
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hebergement = $_POST['hebergement'];
        $aeroport_depart = $_POST['aeroport_depart'];
        $aeroport_retour = $_POST['aeroport_retour'];
    
        $activites = $_POST['activites'];
        $transports = $_POST['transports'];
        $restauration = $_POST['restauration'];
    }

    $montant = calculPrix($hebergement,$aeroport_depart,$aeroport_retour,$activites,$transports,$restauration,$prix_base);
    $montant = number_format((float)$montant, 2, ".", "");

    
    $transaction = $_SESSION["transaction"];// Un ID de transaction unique
    $vendeur = "MI-4_C";
    $retour = "http://localhost/Click_journeY/retour_paiement.php?session=s&dest=$destination"; //URL de retour
    
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
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

    <div class="admin">
    <h1>Récapitulatif du voyage</h1>
    <p><strong>Destination :</strong> <?= htmlspecialchars($destination) ?></p>
    <p><strong>Aéroport de départ :</strong> <?= htmlspecialchars($aeroport_depart) ?></p>
    <p><strong>Date de départ :</strong> <?= htmlspecialchars($date_depart) ?></p>
    <p><strong>Durée :</strong> <?= htmlspecialchars($duree) ?></p>
    <p><strong>Hébergement: </strong> <?= htmlspecialchars($hebergement) ?></p>
    <p><strong>Aéroport de retour :</strong> <?= htmlspecialchars($aeroport_retour) ?></p>
    <?php for ($i=1;$i<=7;$i++){ ?>
        <p><u>Jour <?=$i?> :</u></p>
        <p> <b>Participation aux activités: </b> <?= htmlspecialchars($activites[$i])?></p>
        <p> <b>Moyen de transport: </b> <?= htmlspecialchars($transports[$i])?></p>
        <p><b> Formule de restauration: </b><?= htmlspecialchars($restauration[$i])?></p>
    <?php } ?>
    <p><strong>Prix :</strong> <?= number_format($montant, 2, ",", " ") ?> €</p>

    <div class="kk">
    <a class="bouton" href="voyages.php?dest=<?=$destination?>"> Retour à la personnalisation</a>
    </div>
    
    <form method="post" action="https://www.plateforme-smc.fr/cybank/index.php">
    
    <!-- Identifiant unique de transaction -->
    <input type="hidden" name="transaction" value="<?= htmlspecialchars($transaction) ?>">
    
    <!-- Montant de la transaction -->
    <input type="hidden" name="montant" value="<?= htmlspecialchars($montant) ?>">
    
    <!-- Code vendeur  -->
    <input type="hidden" name="vendeur" value="MI-4_C">
    
    <!-- URL de retour après paiement -->
    <input type="hidden" name="retour" value="http://localhost/Click_journeY/retour_paiement.php?session=s&dest=<?=$destination?>">
    
    <!-- Valeur de contrôle sécurisée -->
    <input type="hidden" name="control" value="<?= $control ?>">

    <button type="submit">Payer</button>
   
    </form>
    </div>
    
</div>
<footer>
    <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
    </footer>
    </body>
</html>
