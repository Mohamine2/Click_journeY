<?php

    session_start();

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

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

    <section class="titre">
        <h1>Allez à travers vos frontières, vivez l'aventure du désert ! </h1>
    </section>

    <section class="accueil">
        <h1> Dunes Seekers</h1>
        <p>Le monde attise la curiosité, les merveilles submergent nos sens et la découverte nous fascine.<br>
            Marre du froid? Des grandes villes? D'une même routine? Envie de voyager?<br>
            Nous sommes ici pour vous guider de la meilleure manière possible pour profiter de ces régions exceptionnelles.<br>
            Traversez le désert, à dos de dromadaires ou en buggy, flânez dans les villes alentours, nous vous garantissons une expériences immersive que vous n'oublierez jamais !
            <br>
            <br>
            <br>
        </p>

    </section>

    <div class="lieu-contenant">
        <div class="lieu">
            <a href="maroc.php">
                <img src="images/marrakech.jpg" alt="img_marrakech" width="400px" height="300px">
                <h2>MAROC</h2>
            </a>
        </div>

       


        <div class="lieu">
            <a href="algerie.php">
                <img src="images/algerie.jpg" alt="img_algerie" width="400px" height="300px">
                <h2>ALGERIE</h2>
            </a>
        </div>



        <div class="lieu">
            <a href="egypte.php">
                <img src="images/egypte.jpg" alt="img_egypte" width="400px" height="300px">
                <h2>EGYPTE</h2>
            </a>
        </div>



        <div class="lieu">
            <a href="arabie_saoudite.php">
                <img src="images/arabie_saoudite.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>ARABIE SAOUDITE</h2>
            </a>
        </div>



 

        <div class="lieu">
            <a href="chine.php">
                <img src="images/chine.jpg" alt="img_chine" width="400px" height="300px">
                <h2>CHINE</h2>
            </a>
        </div>



  



    
    </div>
    
    
    
</body>


</html>