<?php

    session_start();

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

require('getapikey.php'); // Fonction pour récupérer l'API Key


if (!isset($_GET["transaction"]) || !isset($_GET["montant"]) || !isset($_GET["vendeur"]) || !isset($_GET["status"]) || !isset($_GET["control"])) {
    die("Erreur : paramètres manquants.");
}

// Récupérer et nettoyer les valeurs reçues
$transaction = trim($_GET["transaction"]); 
$montant = number_format(floatval($_GET["montant"]), 2, ".", ""); // Assurer le bon format
$vendeur = trim($_GET["vendeur"]);
$status = trim($_GET["status"]);
$control_recu = trim($_GET["control"]);
$destination = trim($_GET['dest']);

// Récupérer l'API Key du vendeur
$api_key = getAPIKey($vendeur);

// Générer la valeur de contrôle attendue
$control_attendu = md5($api_key . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#");

// Vérifier si la valeur de contrôle reçue est correcte
if ($control_recu !== $control_attendu) {
    $message_paiement = "Erreur : les données reçues ne sont pas valides.";
} 

else {
    if ($status === "accepted") {
        $message_paiement = "Paiement validé ! Votre réservation est confirmée.";

        $date_du_jour = date("d/m/Y");

                // Fichier JSON où les commandes sont stockées
                $fichier = "donnees/commandes.json";
            
                // Récupérer les données existantes
                $commandes = [];
                if (file_exists($fichier)) {
                    $json_data = file_get_contents($fichier);
                    $commandes = json_decode($json_data, true) ?? []; // Décoder en tableau associatif
                }
            
                // Nouvelle commande
                $nouvelle_commande = [
                    "nom" => $_SESSION["utilisateur"]["nom"],
                    "prenom" => $_SESSION["utilisateur"]["prenom"],
                    "email" => $_SESSION["utilisateur"]["email"],
                    "numero_transaction" => $transaction,
                    "date_commande" => $date_du_jour,
                    "prix" => $montant,
                    "destination" => $destination
                ];
            
                // Ajouter la nouvelle commande
                $commandes[] = $nouvelle_commande;
            
                // Sauvegarder dans le fichier JSON
                file_put_contents($fichier, json_encode($commandes, JSON_PRETTY_PRINT));

    } else {
        $message_paiement = "Paiement refusé. Merci de réessayer.";
    }
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
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

    <div class="admin">
    <h1>Confirmation de Paiement</h1>
    <p><?= htmlspecialchars($message_paiement) ?></p>
    <p><strong>Numéro de transaction :</strong> <?= htmlspecialchars($transaction) ?></p>
    <p><strong>Montant :</strong> <?= number_format($montant, 2, ",", " ") ?> €</p>
    <p><strong>Statut :</strong> <?php 
        if ($status === "accepted") { 
            echo "Accepté, votre paiement a été validé avec succès.";
        } elseif ($status === "declined") { 
            echo "Refusé. Votre paiement a été refusé. Veuillez réessayer.";
        } ?>   </p>

    <div class="kk">
    <a class="bouton" href="accueil.php">Retour à l'accueil</a>
    </div>
    
            </div>

</body>
</html>

