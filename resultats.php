
<?php
session_start();

// Charger les données des voyages
$voyages = json_decode(file_get_contents('donnees/voyages.json'), true);

$total_voyages = count($voyages);

// Récupérer la valeur de la recherche
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

// Définir combien d'utilisateurs afficher par page
$voyages_par_page = 8;

// Déterminer la page actuelle
$page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
$page = max(1, $page); // Évite qu'une page négative soit sélectionnée

// Calculer l'index de départ et de fin
$debut = ($page - 1) * $voyages_par_page;
$voyages_affiches = array_slice($voyages, $debut, $voyages_par_page);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Résultats de Recherche</title>
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



    <!-- Affichage des résultats -->
<?php if ($searchQuery): ?>
    <h2>Résultats de la recherche pour "<?= htmlspecialchars($searchQuery) ?>"</h2>
    <input type="hidden" id="mot_cle" value="<?= htmlspecialchars($searchQuery) ?>">

    <label for="prixMin">Prix minimum (€) :</label>
    <input type="number" id="prixMin" placeholder="Aucune limite" min="0">

    <label for="prixMax">Prix maximum (€) :</label>
    <input type="number" id="prixMax" placeholder="Aucune limite" min="0">


    <label for="triSelect">Trier par prix :</label>
    <select id="triSelect">
        <option value="">Aucun tri</option>
        <option value="croissant">Prix croissant</option>
        <option value="decroissant">Prix décroissant</option>
    </select>

  </div>

    <div class="voyage-container" id="voyageContainer">
        <?php foreach ($voyages_affiches as $voyage): ?>
            
            <div class="voyage-icone" data-destination="<?= htmlspecialchars($voyage['destination']) ?>" data-prix="<?= htmlspecialchars($voyage['prix']) ?>">
                    <div class="voyage-info">
                    <img src="<?= htmlspecialchars($voyage['image']) ?>" alt="<?= htmlspecialchars($voyage['destination']) ?>" class="voyage-image">
                        <h3><?= htmlspecialchars($voyage['destination']) ?></h3>
                        <p><strong>Départ :</strong> <?= htmlspecialchars($voyage['depart']) ?></p>
                        <p><strong>Durée :</strong> <?= htmlspecialchars($voyage['duree']) ?></p>
                        <p><strong>Prix :</strong> <?= htmlspecialchars($voyage['prix']) ?> €</p>
                        <a href="voyages.php?dest=<?= urlencode($voyage['destination']) ?>" class="voyage-link">Voir plus</a>

                    </div>
                </div>
            
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="pagination">
    <?php if ($page > 1): ?>
        <a class="pages" href="?q=<?= urlencode($searchQuery) ?>&page=<?= $page - 1 ?>">Page précédente</a>
    <?php endif; ?>

    <?php if ($debut + $voyages_par_page < $total_voyages): ?>
        <a class="pages" href="?q=<?= urlencode($searchQuery) ?>&page=<?= $page + 1 ?>" >Page suivante</a>
    <?php endif; ?>
</div>
<footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="theme-toggle">Mode sombre</button>
    </footer>

    <script src="recherche.js"></script>
</body>
</html>