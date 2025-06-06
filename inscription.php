<?php
    session_start();
    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
    require("fonctions_utilisateur.php");
    creation_utilisateur();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Inscription à Dunes Seekers</title>
</head>

<script src="formulaire.js"></script>

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
            <li><a href="admin.php">Espace Admin</a></li>
        <?php endif; ?>
        </ul>
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>


    <div class="boite_inscription">
        <h3> Formulaire d'inscription </h3>
        <form method="post" class="form_inscription" action="inscription.php">
            <label for="nom"> Nom: </label>
            <input type="text" name="nom" id="nom" required />
            <label for="prenom"> Prénom: </label>
            <input type="text" name="prenom" id="prenom" required />
            <label for="telephone"> Téléphone: </label>
            <input type="tel" id="telephone" name="telephone" pattern="(\+33|0)[1-9][0-9]{8}"
                placeholder="+33 6 12 34 56 78" required>
            <label for="mail"> Adresse Mail: </label>
            <input type="email" name="mail" id="mail" required />
            <label for="mdp"> Création Mot de passe: </label>
            <input type="password" name="mdp" id="mdp" required />
            <label for="mdp"> Confirmer Mot de passe: </label>
            <input type="password" name="mdp2" id="mdp2" required />
            <button type="submit" name="inscription"> Confirmer </button>
        </form>
    </div>

    <footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>

    <script src="mode_sombre.js"></script>

</body>

</html>