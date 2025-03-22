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
    <title>Emirats Arabes Unis - Dunes Seekers</title>
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
            <h1>Votee voyage de rêve au sein des merveilles des Emirats Arabes Unis l'Arabie Saoudite et leur désert. </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivé à Dubaï</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Dubaï
                        et découvrir la ville du soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Visite des souks et de Palm Jumeirah</h3>
                    <p>Exploration des souks traditionnels de Dubaï : le souk de l'or et le souk des épices. 
                        Et ensuite, départ pour Palm Jumeira île artificielle en forme de palmier</p>
                    </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Désert de Dubaï</h3>
                    <p>Excursion dans le désert pour une expérience de dune bashing en 4x4. Vous ferez également une balade
                        à dos de chameau.Et la possibilité de manger sous les étoiles dans un camp bédouin.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Abou Dabi et la Grande Mosquée Sheikh Zayed</h3>
                    <p>En route pour Abou Dabi pour visiter la magnifique mosquée Sheikh Zayed, l’une des plus grandes mosquées du monde.
                        Ensuite, explorez le musée du Louvre d’Abou Dabi et le quartier culturel de Saadiyat Island.   </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Le désert de Liwa</h3>
                    <p>Découverte du désert de Liwa, situé dans le Rub al-Khali.
                    Vous pourrez profiter de safaris en 4x4 et expérimenter le sandboarding sur les dunes de sable doré.        </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Fujairah et les plages</h3>
                    <p>Départ pour Fujairah sur la côte est. Profitez des plages immaculées de l’océan Indien, où vous pourrez vous détendre et
                        nager. Visite également du fort de Fujairah et de son musée local.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats à Dubaï et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/emirats_arabes_unis1.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Désert de Dubaï</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/emirats_arabes_unis2.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Louvre abu dhabi</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/emirats_arabes_unis3.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Désert de Liwa</h2>
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
