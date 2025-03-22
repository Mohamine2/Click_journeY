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
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Algerie - Dunes Seekers</title>
</head>


<body>
    
    <header>
        <a href="accueil.php"> Dunes Seekers </a>
    </header>
    
    <nav>
        <ul>
            <li><a href="accueil.php">Accueil</a></li>
            <li><a href="recherche.php">Recherche</a></li>
            <li><a href="connexion.php">Connectez-vous</a></li>
            <li><a href="profil.php">Mon profil</a></li>
            <li><a href="presentation.php">À propos</a></li>
        </ul>
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

    <!-- choix-->
    <section class="titre">
            <h1>Un voyage dynamique à travers une exploration en Algérie </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Alger</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours d'Alger, notamment le monument Monument Martyr et le jardin d'Essai
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Timimoun</h3>
                    <p>Balade dans la pameraie tolga où vous pourriez faire qu'un avec la nature.
                       Et la découverte foggaras qui sont d'anciens systèmes d'irrigation souterrains.
                    </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Villages Sahariens</h3>
                    <p>Découverte de nouveaux plats ou boissons comme le tajine puis enchaînez avec une visite avec des
                        artisans locaux pour voir des tapis, de la poteries ou des bijoux...Et une soirée musicale autour d'un
                        d'un feu de camp.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Excursion dans les Dunes</h3>
                    <p>Voyage inoubliable à dos de dromadaire à travers les dunes dorées du Grand Erg Occidental. 
                        et où vous allez faire un pique-nique traditionnels en plus d'une nuit en bivouac</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>La Vallée du M’Zab</h3>
                    <p>En route en 4x4 pour Ghardaïa, vous allez pouvoir faire la visite d'une ville classée à 
                        l'UNESCO et découvrir la fameuse vallée du M'zad et ses villages millénaires.
                        </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Djanet & Tassili n'Ajjer</h3>
                    <p>Vol pour Djanet et deuxième excursion en 4x4 dans le Tassili n'Ajjer, pour être émerveillé du décor lunaire naturel 
                        avec des roches sculptées par le vent et des peintures rupestres milénaires.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Retour et départ</h3>
                    <p>Retour à Alger pour une journée relaxante pour faire ses derniers achats et déguster votre dernier thé à la menthe
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/algerie1.jpg" alt="img_algerie" width="400px" height="300px">
                <h2>Tassili N'Ajjer</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/algerie3.jpg" alt="img_algerie" width="400px" height="300px">
                <h2>Jardin d'essai du Hamma</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/algerie2.jpg" alt="img_algerie" width="400px" height="300px">
                <h2>Monument Martyr</h2>
            </a>
        </div>
    </div>
</body>

    <!-- achat ticket (recherche) -->
    <section class="contact">
        <div class="container">
            <h2>Planifiez votre voyage</h2>
            <p>Obtenez un devis personnalisé pour votre aventure au Maroc.</p>
            <a href="recapitulatif.php" class="ticket-btn">Réservez un séjour</a>
        </div>
    </section>
    
</body>

</html>
