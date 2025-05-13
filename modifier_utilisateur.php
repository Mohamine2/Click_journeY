<?php
session_start();

$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Sécurité : s'assurer que seul un admin peut modifier
if (!isset($_SESSION["utilisateur"]) || $_SESSION["utilisateur"]["role"] !== "admin") {
    header("Location: accueil.php");
    exit;
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : -1;
$utilisateurs = json_decode(file_get_contents("donnees/utilisateurs.json"), true);

// Vérifie que l'ID est valide
if ($id < 0 || $id >= count($utilisateurs)) {
    echo "Utilisateur introuvable.";
    exit;
}

$user = $utilisateurs[$id];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="style.css">
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
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

<main class="conteneur_compte">
<div class="boite_connexion">
    <div class="connexion">
    <h2>Modifier l'utilisateur</h2>

    <form id="form-modification" method="post" class="form_inscription">
    <input type="hidden" name="id" value="<?= $id ?>">

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>

    <label for="role">Rôle :</label>
    <select name="role" id="role" required>
        <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Client</option>
        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>

    <button type="submit">Enregistrer</button>
    <!-- From Uiverse.io by barisdogansutcu --> 
    <span id="loader" style="display:none;">
    <svg id="tkt" viewBox="25 25 50 50" width="40" height="40">
    <circle r="18" cy="50" cx="50"></circle>
    </svg>
    </span>
    
    <span id="ok" style="display:none; color:green;">Modifié</span>
</form>

        
        </div>
</div>
</main>

<footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>
<script src="mode_sombre.js"></script>
<script src="modifications.js"></script>

</body>
</html>