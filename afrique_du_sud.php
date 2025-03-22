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
    <title>Afrique du sud - Dunes Seekers</title>
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
            <h1>Voyage de découverte au sein des déserts d'Afrique du Sud, entre Karoo et Kalahari.</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivée à Johannesburg</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Johannesburg, notamment quartier historique de Soweto et du musée de l'Apartheid.
                    </p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert du Karoo</h3>
                    <p>Départ pour le désert du Karoo, une vaste étendue semi-aride aux paysages fascinants.
                    Et découverte des formations rocheuses et des grands espaces sauvages.</p>
                    </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Exploration du désert du Karoo</h3>
                    <p>Randonnée dans le parc national du Karoo, observation de la faune locale et découverte
                    des peintures rupestres des peuples San.
                        </p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Culture sud-africains</h3>
                    <p>Excursion dans les vignobles du Karoo, dégustation de vins sud-africains et découverte des fermes 
                    locales intégrées dans cet environnement aride.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Safari dans le désert du Kalahari</h3>
                    <p>Journée de safari dans le parc transfrontalier du Kgalagadi,
                    où vous pourrez observer lions, oryx et autres animaux adaptés aux conditions désertiques.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Dunes rouges</h3>
                    <p>Découverte des célèbres dunes rouges du Kalahari et rencontre
                     avec les communautés locales et initiation aux techniques de survie dans le désert.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour à Johannesburg pour une journée relaxante, faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/afrique_du_sud1.jpg" alt="img_afrique_du_sud" width="400px" height="300px">
                <h2>Désert du Karoo</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/afrique_du_sud2.jpg" alt="img_afrique_du_sud" width="400px" height="300px">
                <h2>Safari Kalahari</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/afrique_du_sud3.jpg" alt="img_afrique_du_sud" width="400px" height="300px">
                <h2>Dune rouge</h2>
            </a>
        </div>
    </div>
</body>

    <!-- achat ticket (recherche) -->
    <section class="contact">
        <div class="container">
            <h2>Planifiez votre voyage</h2>
            <p>Obtenez un devis personnalisé pour votre aventure au Sénégal.</p>
            <a href="recherche.html" class="ticket-btn">Réservez un séjour</a>
        </div>
    </section>
    
</body>

</html>
