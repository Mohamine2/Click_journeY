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
    <title>Sénégal - Dunes Seekers</title>
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
            <h1>Votre voyage immersif au sein d'un pays authentique comme le Sénégal </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Dakar</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Dakar, notamment la place de l’Indépendance, et ce
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Safari</h3>
                    <p>Exploration du paysage au coeur du parc National de Bandia où vous pouvez observez des animaux
                    qui se trouvent principalement en Afrique (crocodiles,rhinocéros & éléphants).                       </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Ile de Gorée</h3>
                    <p>Trajet en ferry vers l'île de Gorée, une visite chargée d'histoire avec la visite
                        des monuments aux esclaves et du musée historique.                   </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Désert de Lompoul</h3>
                    <p>Voyage unique à travers une randonnée et la possibilité d'avoir une balade à dos de dromadaire .Vous aurez l'occasion de ne faire qu'un avec 
                        la nature et être accueillis dans un campement traditionnel où il y aura de la nourriture et des animations traditionnels.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Lac Rose</h3>
                    <p>A la découverte du fameux Lac Rose à travers une excursion en pirogue sur le lac. Vous allez pouvoir explorer tout le paysage sableux qui l'entoure
                        et aussi avoir la possibilité de faire du quad</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Détente</h3>
                    <p>Profiter d'un paysages contrastant avec les zones les plus arides du nords, caractérisé par du sable blanc et fin, bordé par des cocotiers.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats dans le souk de Dakar et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/senegalI1.jpg" alt="img_Marrakech" width="400px" height="300px">
                <h2>Safari</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/senegalI2.jpg" alt="img_dakar" width="400px" height="300px">
                <h2>Fleuve du Sénégal</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/senegalI3.jpg" alt="img_oman" width="400px" height="300px">
                <h2>Quad</h2>
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
