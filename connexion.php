<?php

session_start(); 

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["utilisateur"])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: profil.php");
    exit();
}

$mail = ""; //garder le mail
$mdp = ""; // garde le mdp
$erreurConnexion = ""; //garder le msg affiché

if(isset($_POST["connexion"])){

    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    if(empty($mail)){
        $erreurConnexion = "Vous devez entrer une adresse mail";
    }
    else if(empty($mdp)){
        $erreurConnexion = "Vous devez entrer un mot de passe";
    }
    
    else{
        $fichier = 'donnees/utilisateurs.json';

        if (!file_exists($fichier)) {
            die("Erreur : Le fichier JSON n'existe pas.");
        }

        $data = file_get_contents($fichier);
        $comptes = json_decode($data, true);

        if ($comptes === null) {
            die("Erreur : Impossible de décoder le fichier JSON.");
        }

        // Vérifier si l'email et le mot de passe correspondent
        foreach ($comptes as $key => $compte) {
            if ($compte["email"] == $mail && password_verify($mdp, $compte["mot_de_passe"])) {

                // Mettre à jour la date de connexion
                $date_connexion = date("d-m-Y H:i:s");
                $comptes[$key]["date_connexion"] = $date_connexion;
                // Sauvegarder la mise à jour dans le fichier JSON
                file_put_contents($fichier, json_encode($comptes, JSON_PRETTY_PRINT));

                // Stocker la session et rediriger vers la page protégée
                $_SESSION["utilisateur"] = [
                    "email" => $compte["email"],
                    "nom" => $compte["nom"],
                    "prenom" => $compte["prenom"],
                    "numero" => $compte["numero"],
                    "role" => $compte["role"],
                    "date_inscription" => $compte["date_inscription"],
                    "date_connexion" => $date_connexion
                ];
                header("Location: profil.php");
                exit();
            }
        }

        // Si aucun compte ne correspond
        $erreurConnexion = "Email ou mot de passe incorrect.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <script src="formulaire.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Connexion à Dunes Seekers</title>
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

    <div class="boite_connexion">
        <div class="connexion">
            <h3> Connexion </h3>
            <?php if (!empty($erreurConnexion)): ?>
                <div class="message-erreur" style="color: red; margin-bottom: 10px;">
                    <?= htmlspecialchars($erreurConnexion) ?>
                </div>
            <?php endif; ?>
            <form class="form_connexion" method="post" action="connexion.php">
                <label for="mail"> Adresse Mail: </label>
                <input type="email" name="mail" id="mail" required value="<?= htmlspecialchars($mail) ?>" />
                <label for="mdp"> Mot de passe: </label>
                <input type="password" name="mdp" id="mdp" required value="<?= htmlspecialchars($mdp) ?>" />
                <button type="submit" name="connexion"> Confirmer </button>
            </form>

            <p>Pas de compte ? </p>
            <a href="inscription.php" >Créer un compte</a>

        </div>
    </div>

    <footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>

    <script src="mode_sombre.js"></script>

</body>

</html>
