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
        <button id="theme-toggle">Mode sombre</button>
    </footer>

    <script>
        const toggleButton = document.getElementById('theme-toggle');
        const html = document.documentElement;

        // Lire un cookie spécifique
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Écrire un cookie (valable 1 an)
        function setCookie(name, value, days = 365) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = `${name}=${value}; ${expires}; path=/`;
        }

        function updateButtonText() {
            toggleButton.textContent = html.classList.contains('dark-mode')
                ? 'Mode clair'
                : 'Mode sombre';
        }

        // Appliquer le thème au chargement si cookie présent
        const theme = getCookie('theme');
        if (theme === 'dark') {
            html.classList.add('dark-mode');
        }

        updateButtonText();

        toggleButton.addEventListener('click', () => {
            html.classList.toggle('dark-mode');
            const newTheme = html.classList.contains('dark-mode') ? 'dark' : 'light';
            setCookie('theme', newTheme);
            updateButtonText();
        });
    </script>

</body>

</html>