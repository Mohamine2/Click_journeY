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
    <title>Chine - Dunes Seekers</title>
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
            <h1>Un voyage à la découverte du désert de la Chine et ses traditions millénaires</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivée à pékin</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Vous allez ensuite prendre un vol vers le désert de Badain Jaran.
                    </p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert de Badain Jaran</h3>
                    <p>Excursion en 4x4 à travers les dunes du désert de Badain Jaran. 
                        Observation des formations géologiques uniques et découverte des oasis isolées. 
                        Possibilité de faire une promenade à dos de chameau ou de participer à une expérience de conduite sur les dunes.</p>
                    </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Désert de Taklamakan</h3>
                    <p>Départ pour le désert de Taklamakan, situé au cœur du Xinjiang. 
                        Exploration des mystérieuses ruines anciennes enfouies sous le sable, témoignant de civilisations disparues.
                        Et nuit dans un campement au pied des dunes.</p>
            
                    </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Dunhuang et des grottes de Mogao</h3>
                    <p>Visite de Dunhuang, point de passage historique de la route de la soie.
                         Découverte des célèbres grottes de Mogao, classées au patrimoine mondial de l'UNESCO, avec leurs sculptures et fresques bouddhistes. 
                         Et promenade dans la vallée du Yardan, aussi appelée "le désert des sculptures naturelles".</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Désert de Gobi</h3>
                    <p>Vol vers le désert de Gobi, situé dans le nord de la Chine.
                        Exploration des vastes plaines et des dunes d'une beauté saisissante.
                        Et randonnée dans les canyons, visites des formations rocheuses uniques et observation de la faune locale, notamment les chameaux sauvages et les gazelles.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Culture nomade du désert</h3>
                    <p>En route vers les villages nomades traditionnels, où vous allez découvrir la vie quotidienne des habitants des déserts chinois.
                        Avec des dégustation de plats typiques et leurs méthodes d'élevage.</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour à Pékin pour une journée relaxante, faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/chine1.jpg" alt="img_chine" width="400px" height="300px">
                <h2>Désert de Badain Jaran</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/chine2.jpg" alt="img_chine" width="400px" height="300px">
                <h2>Grottes de Mogao</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/chine3.jpg" alt="img_chine" width="400px" height="300px">
                <h2>Désert de Taklamakan</h2>
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
