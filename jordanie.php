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
    <title>Jordanie - Dunes Seekers</title>
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
            <h1>Votre voyage à travers un désert et l'histoire oublié de la Jordanie.</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivée à Amman</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours d'Amman, notamment la citadelle d'Amman 
                        </p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Ville de Jérash</h3>
                    <p>Excursion à Jérash, une des villes romaines les mieux conservées au monde.
                    Explorez les ruines impressionnantes de temples, théâtres, et arches.</p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Le désert de Wadi Rum</h3>
                    <p>Départ pour le désert de Wadi Rum, classé au patrimoine mondial de l'UNESCO.
                       Safari en 4x4 à travers les majestueuses formations rocheuses et les vastes dunes de sable.
                       Avec nuit dans un camp bédouin traditionnel,sous les étoiles.</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Petra, la rose rouge</h3>
                    <p>Visite du site emblématique de Petra, l'ancienne cité nabatéenne sculptée dans la roche.
                        Promenade à travers le Siq jusqu'au Trésor (Al-Khazneh), puis exploration de l’ancienne ville, avec ses temples, tombes et théâtres.</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>La mer Morte</h3>
                    <p>En route pour la mer Morte où vous pourrez vous baigner et avoir une vue sur le désert au bord de la mer morte.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Château & vallée</h3>
                    <p>Exploration du château de Kerak, une forteresse médiévale située sur une colline offrant une vue panoramique.
                        Et ensuite vous allez faire l'exploration de la vallée du Jourdain et de ses paysages magnifiques.</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/jordanie1.jpg" alt="img_jordanie" width="400px" height="300px">
                <h2>Jérash</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/jordanie2.jpg" alt="img_jordanie" width="400px" height="300px">
                <h2>Pétra</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/jordanie3.jpg" alt="img_jordanie" width="400px" height="300px">
                <h2>château de Kerak</h2>
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
