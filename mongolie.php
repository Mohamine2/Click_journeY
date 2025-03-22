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
    <title>Mongolie - Dunes Seekers</title>
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
            <h1>A travers les paysages sauvages et naturels de la Mongolie</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivée à Oulan-Bator</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions.Il vous fera visiter les alentours d'Alger, notamment le musée national.
                    </p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert de Gobi</h3>
                    <p>Départ vers le désert de Gobi, un des déserts les plus fascinants du monde.
                        Où vous allez pouvoir découvrir des paysages variés : dunes de sables, montagnes , canyons...
                    </p>
                    </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Bayanzag et ses rochers</h3>
                    <p>Visite des formations rocheuses de Bayanzag, connues sous le nom de "Falaises des dinosaures",
                        où des fossiles de dinosaures ont été découverts.
                        Et une balade à travers les paysages arides est possible pour observer la faune locale et les célèbres
                        "falaises enflammées" au coucher du soleil.</p>
            
                    </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Oasis de Yolyn Am</h3>
                    <p>Excursion dans la vallée de Yolyn Am, un canyon spectaculaire dans le parc national de 
                  Gobi Gurvan Saikhan. Promenade à pied dans le canyon et observation des animaux sauvages tels que les gazelles 
                  et les aigles.
                </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Montagnes de l'Altaï</h3>
                    <p>Exploration dans les montagnes de l'Altaï, à l'ouest de la Mongolie,
                  pour explorer les paysages désertiques et montagneux.Où vous allez pouvoir observer des paysages grandioses
                  et des vestiges historiques laissés par les anciennes civilisations.
                </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Culture nomade du désert</h3>
                    <p>En route vers les villages nomades traditionnels, où vous allez découvrir la vie quotidienne des Mongols.
                        Avec des dégustation de plats typiques et leurs méthodes d'élevage.</p>
                    </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Retour à Oulan-Bator pour une journée relaxante, faire ses derniers achats et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/mongolie1.jpg" alt="img_mongolie" width="400px" height="300px">
                <h2>Désert de Gobi</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/mongolie2.jpg" alt="img_mongolie" width="400px" height="300px">
                <h2>Falaise de Byanzag</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/mongolie3.jpg" alt="img_mongolie" width="400px" height="300px">
                <h2>Nomade du désert</h2>
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
