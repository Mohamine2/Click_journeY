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
    <title>Tunisie - Dunes Seekers</title>
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
            <h1>Votre voyage à travers le Sahara et le patrimoine de Tunisie </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Tunis</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Tunis, notamment site archéologique de Carthage
                        et une premenade dans la médina et les souk.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Kairouan, ville sainte</h3>
                    <p>Découverte de Kairouan, ville sacrée avec sa Grande Mosquée, le bassin des Aghlabides
                    et les ateliers de tapis traditionnels. Dégustation du célèbre makroud.                 </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Tozeur et les oasis</h3>
                    <p>En route vers Tozeur, ville oasis aux portes du désert. Balade dans la palmeraie et découverte
                    des décors de Star Wars à Ong Jemel. </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Douz</h3>
                    <p>Départ vers Douz, la porte du Sahara. Expérience inoubliable avec une randonnée à dos de dromadaire
                    dans les dunes, suivi d'un dîner et d'une nuit sous tente berbère.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Tataouine et les ksour</h3>
                    <p>Découverte des ksour berbères autour de Tataouine, notamment Ksar Ouled Soltane et Chenini,
                    villages fortifiés offrant une vue spectaculaire sur le désert.     </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Matmata et ses troglodytes</h3>
                    <p>Exploration de Matmata, célèbre pour ses maisons troglodytes. Visite du site de tournage
                    de Star Wars (hôtel Sidi Driss), puis retour à Tunis avec un arrêt au colisée d'El Jem.         </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats dans le souk de Tunis et avoir du temps libre
                        dans la médina avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/tunisie1.jpg" alt="img_tunisie" width="400px" height="300px">
                <h2>Kairouan</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/tunisie2.jpg" alt="img_tunisie" width="400px" height="300px">
                <h2>Matmama (star wars)</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/tunisie3.jpg" alt="img_tunisie" width="400px" height="300px">
                <h2>El Jem Amphitheatre</h2>
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
