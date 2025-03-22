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
    <title>Mali - Dunes Seekers</title>
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
            <h1>En route pour un voyage inoubliable à travers le pays le plus chaud au monde.</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Bamako</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Bamako, notamment le musée national et le marché rose et ce
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>La perle du Sahel</h3>
                    <p>En route en 4x4 vers Djenné, vous allez pouvoir observer et découvrir les villages en banco et paysages sahéliens.
                        Et aussi faire la visite de la Mosquée de Djenée, un chef-d'oeuvre classé à l'UNESCO.
                        </p>
                    </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Traversé & Tombouctou</h3>
                    <p>Exploration à travers une traversée du fleuve Niger en pirogue vers Tombouctou avec vu sur pêcheurs et riverains.
                        Puis, visite de la Mosquée de Djingareyber et des bibliothèques de manuscrits anciens.
                        </p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Touarègue</h3>
                    <p>Avec un départ en caravane de dromadaires, explorer les dunes proches de Tombouctou.
                        Vous allez pouvoir observer le coucher du soleil sur les dunes et passer une nuit sous tente nomade.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Montagne et Histoire</h3>
                    <p>Départ pour Hombori où vous allezz fait l'ascension du Mont Hombori puis faire
                        la visitie des habitations troglodytiques si vous avez encore de l'energie. Pour ensuite, recontrer les habitants et la tradition locale.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Pays Dogon</h3>
                    <p>Visiter le village de Sangha perché sur la falaise de Bandiagara.
                        Vous allez aussi explorer des greniers troglodytiques.Si vous êtes chanceux, le spectacle de danses des masques Dogons vous attends.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour à Bamako pour une journée relaxante, faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/mali1.jpg" alt="img_mali" width="400px" height="300px">
                <h2>Mosquée de Djenée</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/mali2.jpg" alt="img_mali" width="400px" height="300px">
                <h2>Falaise de Bandiagara</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/mali3.jpg" alt="img_mali" width="400px" height="300px">
                <h2>Monts Hombori</h2>
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
