<?php

session_start(); 

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
        <a href="accueil.html"> Dunes Seekers </a>
    </header>

    <nav>
        <ul>
            <li><a href="accueil.php"> Accueil </a></li>
            <li><a href="recherche.php"> Recherche </a></li>
            <li><a href="connexion.php"> Connectez-vous</a></li>
            <li><a href="profil.php"> Mon profil</a></li>
            <li><a href="presentation.php"> A propos de nous </a></li>
            <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] === "admin"): ?>
            <li><a href="admin.php">Espace Admin</a></li>
        <?php endif; ?>
        </ul>
        <input type="search" placeholder="Rechercher...">
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
            <a href="maroc.html">
                <img src="images/marrakech.jpg" alt="img_Marrakech" width="400px" height="300px">
                <h2>MAROC</h2>
            </a>
        </div>
        <div class="lieu">
            <a href="senegal.html">
                <img src="images/dakar.jpg" alt="img_dakar" width="400px" height="300px">
                <h2>SENEGAL</h2>
            </a>
        </div>
        <div class="lieu">
            <a href="oman.html">
                <img src="images/oman.jpg" alt="img_oman" width="400px" height="300px">
                <h2>OMAN</h2>
            </a>
        </div>
    </div>

    
</body>


</html>