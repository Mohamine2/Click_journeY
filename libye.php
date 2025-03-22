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
    <title>Libye - Dunes Seekers</title>
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
            <h1>Votre voyage à travers une exploration fascinante de la Libye </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Tripoli</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Tripoli, notamment le musée national
                        et une premenade dans la médina.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Leptis Magna</h3>
                    <p>Excursion à Leptis Magna, l'un des sites romains les mieux préservés au monde.
                    Et découverte du théâtre, du marché, des thermes et du grand amphithéâtre.     </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Ghadamès, une perle du désert</h3>
                    <p>Départ pour Ghadamès, une ville oasis classée au patrimoine mondial de l'UNESCO.
                   Où vous allez faire l'exploration de la vieille ville aux ruelles couvertes et découverte de l'architecture saharienne.        </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Sahara</h3>
                    <p>Excursion en 4x4 à travers les dunes et les paysages lunaires du désert libyen.
                    La soirée sera sous une tente bédouine avec dîner traditionnel.     </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Akakus</h3>
                    <p>Découverte des montagnes de l'Akakus et des peintures rupestres millénaires illustrant
                    la vie dans le Sahara préhistorique.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Sebha et les oasis du Fezzan</h3>
                    <p>Exploration de la région du Fezzan et de ses oasis, notamment Waw an Namus, un volcan spectaculaire
                    entouré de lacs colorés.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour a Tripoli pour profiter d'une journée relaxante pour faire ses derniers achats dans le souk et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/libye1.jpg" alt="img_libye" width="400px" height="300px">
                <h2>Amphithéâtre de Leptis Magna</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/libye2.jpg" alt="img_libye" width="400px" height="300px">
                <h2>Akakus</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/libye3.jpg" alt="img_libye" width="400px" height="300px">
                <h2>Cratère Waw an Namus</h2>
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
