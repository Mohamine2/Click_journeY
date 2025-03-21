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
    <title>Oman - Dunes Seekers</title>
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
            <h1>Votre voyage au sein du désert Sharqiya Sands</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Mascate</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours, notamment la Grande Mosquée du Sultan Qaboos ou encore le souk de Muttrah
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Wahiba Sands</h3>
                    <p>Exploration du fameux désert, l'occasion rêvée de découvrir ses canyons spectaculaires, 
                       des merveilles naturelles et ressentir l'esprit d'un aventurier à travers cette randonée.
                    </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Wahiba sands</h3>
                    <p>Deuxième jour de randonnée où vous allez pouvoir vivre comme un nomade, vous baigner dans des piscines naturelles
                        et surtout voir les dunes qui s'étendent comme des vagues d'or sous le soleil.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Wadi shab</h3>
                    <p>Voyage unique à travers un safari en 4x4, une balade à dos de chameau et nuit dans un campement traditionnel 
                        où vous pourriez vous faire l'installation et se détendre sous les étoiles.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Découverte de Nizwa</h3>
                    <p>En route vers Nizwa pour avoir l'occasion de visiter la forteresse de Nizwa
                        et son marché traditionnel, l'occasion de découvrir ses artisans authentiques. 
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Détente près des côtes</h3>
                    <p>Visite des plages de la côte omanaise où vous pourrez vous baigner et vous reposer,
                        découvrir des villages de pêcheurs et manger des fruits de mer face à la mer.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire les derniers achats dans le souk de Mascate et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/OmanI1.jpg" alt="img_Marrakech" width="400px" height="300px">
                <h2>Mosque du Sultan</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/OmanI2.jpg" alt="img_dakar" width="400px" height="300px">
                <h2>Wadi shab</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/OmanI3.jpg" alt="img_oman" width="400px" height="300px">
                <h2>Nizwa forteresse</h2>
            </a>
        </div>
    </div>
</body>

    <!-- achat ticket (recherche) -->
    <section class="contact">
        <div class="container">
            <h2>Planifiez votre voyage</h2>
            <p>Obtenez un devis personnalisé pour votre aventure en Oman.</p>
            <a href="recherche.html" class="ticket-btn">Réservez un séjour</a>
        </div>
    </section>
    
</body>

</html>
