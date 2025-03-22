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
    <title>Namibie - Dunes Seekers</title>
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
            <h1>Voyage à travers la Namibie et ses déserts de dunes, de faunes sauvage et de ses paysages spectaculaires.</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivée à Windhoek</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours du Caire, notamment des marchés locaux.
                        </p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert du Namib</h3>
                    <p>En route pour le désert du Namib et la découverte de Sesriem, porte d’entrée de Sossusvlei. 
                    Balade au coucher du soleil dans le canyon de Sesriem.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Sossusvlei et Deadvlei</h3>
                    <p>Départ vers Swakopmund, une ville côtière entre océan et désert.
                    Découverte de la côte des Squelettes, connue pour ses épaves de bateaux échoués.</p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Désert du Kalahari</h3>
                    <p>Découverte du désert du Kalahari, un autre joyau de la Namibie. 
                  Rencontre avec la faune locale et visite d'un village bushman pour en apprendre davantage 
                  sur leur mode de vie ancestral.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Safari dans le parc d'Etosha 1/2</h3>
                    <p>Journée consacrée à un safari dans le parc national d'Etosha, 
                    célèbre pour ses vastes plaines arides et ses nombreux animaux sauvages.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Safari dans le parc d'Etosha 2/2</h3>
                    <p>Deuxième journée consacrée à un safari.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour à Windhoek pour une journée relaxante, faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/namibie1.jpg" alt="img_namibie" width="400px" height="300px">
                <h2>Désert du Namib</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/namibie2.jpg" alt="img_namibie" width="400px" height="300px">
                <h2>Deadvlei</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/namibie3.jpg" alt="img_namibiee" width="400px" height="300px">
                <h2>Parc national d'Etosha</h2>
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
