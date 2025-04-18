<?php

session_start(); 
    
// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Lire le fichier JSON
$utilisateurs = json_decode(file_get_contents("donnees/utilisateurs.json"), true);

// Définir combien d'utilisateurs afficher par page
$utilisateurs_par_page = 5;

// Déterminer la page actuelle
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$page = max(1, $page); // Évite qu'une page négative soit sélectionnée

// Calculer l'index de départ et de fin
$debut = ($page - 1) * $utilisateurs_par_page;
$utilisateurs_affiches = array_slice($utilisateurs, $debut, $utilisateurs_par_page);
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Infos Admin</title>
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
    <p class="client"><b>Liste des utilisateurs inscrits:</b></p>

    <?php foreach ($utilisateurs_affiches as $user): ?>
        <p class="client"><?= htmlspecialchars($user["nom"] . " " . $user["prenom"])?> </br>
        Inscription: <?=htmlspecialchars($user["date_inscription"])?> </br>
        Dernière connexion: <?=htmlspecialchars($user["date_connexion"])?> </br>
        <em><?=htmlspecialchars($user["role"])?></em></p>

    <?php endforeach; ?>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="pages">Page précédente</a>
        <?php endif; ?>

        <?php if ($debut + $utilisateurs_par_page < count($utilisateurs)): ?>
            <a href="?page=<?= $page + 1 ?>" class="pages">Page suivante</a>
        <?php endif; ?>
    </div>
</div>
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