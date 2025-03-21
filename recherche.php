<?php
    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Recherche</title>
</head>

<body>

    <header>
        <a href="accueil.html"> Dunes Seekers </a>
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

    <div class="form_recherche">
        <form method="post" class="recherche">
            <fieldset method="get" class="recherche">
                <legend class="recherche"> Trouvez votre excursion </legend>
                <p> Départ: </p>
                <select name="depart">
                    <option value="Paris" selected="selected"> Paris </option>
                    <option value="Lyon"> Lyon </option>
                    <option value="Marseille"> Marseille </option>
                </select>
                <p> Destination: </p>
                <select name="destination">
                    <option value="Marrakech" selected="selected"> Marrakech </option>
                    <option value="Oman"> Oman </option>
                    <option value="Dakar"> Dakar </option>
                </select>
                <br/>
                <label for="datedep"> Date de départ </label>
                <br/>
                <input type="date" name="datedep" required />
                <p> Durée du voyage:  </p>
                <select name="duree">
                    <option value="3j" selected="selected"> 3 jours </option>
                    <option value="5j"> 5 jours </option>
                    <option value="7j"> 7 jours </option>
                </select>
                <br/>
                <label for="adultes"> Adultes </label>
                <input type="number" name="adultes" value="1" min="1" max="15" required />
                <label for="enfants"> Enfants </label>
                <input type="number" name="enfants" value="0" min="0" max="15" required /> <br> <br>
                <button type="submit"> Chercher une excursion </button>
            </fieldset>
        </form>
    </div>

</body>

</html>