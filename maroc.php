<?php
    session_start();
    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
     
    // Charger les voyages depuis le JSON
    $voyages = json_decode(file_get_contents("voyages.json"), true);
    
    // Chercher l'entrée correspondant au Maroc
    $voyage_selectionne = null;
    foreach ($voyages as $voyage) {
        if ($voyage["destination"] === "Maroc") { // Rechercher l'entrée
            $voyage_selectionne = $voyage;
            break;
        }
    }
    
    // Si le voyage n'est pas trouvé, afficher une erreur
    if (!$voyage_selectionne) {
        die("Erreur : le voyage au Maroc n'existe pas dans le JSON.");
    }
    
    // Stocker les infos en session pour le paiement
    $_SESSION["destination"] = $voyage_selectionne["destination"];
    $_SESSION["prix"] = $voyage_selectionne["prix"];
    $_SESSION["depart"] = $voyage_selectionne["depart"];
    $_SESSION["date_depart"] = $voyage_selectionne["date_depart"];
    $_SESSION["duree"] = $voyage_selectionne["duree"];
    $_SESSION["transaction"] = bin2hex(random_bytes(10));
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Maroc - Dunes Seekers</title>
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
            <h1>Votre voyage à travers une exploration culturelle au Maroc </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Médina</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Médina, notamment la place Jemaa el-Fna
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert d'Agafay</h3>
                    <p>Exploration du paysage lunaire à travers la randonnée à dos de dromadaires.
                       Vous aurez aussi la possibilité de faire du buggy dans les dunes pendant cette expérience nomade.
                    </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Patrimoine & Histoire</h3>
                    <p>Découverte de nouveaux plats ou boissons comme le thé à la menthe puis enchaînez avec une visite dans des monuments
                        emblématiques tel que le Palais de la Bahia, le Tombeaux Saadiens et Médersa Ben Youssef.                   </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Vallée de l'Ourika</h3>
                    <p>Voyage unique à travers une randonnée vers les cascades de Setti Fatma. Vous pourrez vous relaxer 
                        la nature et être accueillis dans une maison où vous dégusterez un tajine traditionnel.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Aït Ben Haddou</h3>
                    <p>A Kasbah Aït Ben Haddou, vous allez pouvoir faire la visite des studios de cinéma à Ouarzazate(ex:Game of Thrones)
                        et aussi découvrir des villages berbères traditionnels.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Jardins & repos</h3>
                    <p>Journée apaisante où vous allez pouvoir découvrir la cuisine marocaine grâce à des restaurants. Vous pourrez aussi faire la visite de plusieurs
                         jardins tel que Majorelle et le jardin Secret Medina Marrakech.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats dans le souk de Marrakech et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/marocI1.jpg" alt="img_Marrakech" width="400px" height="300px">
                <h2>Palais de la Bahia</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/marocI2.jpg" alt="img_dakar" width="400px" height="300px">
                <h2>Buggy désert</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/marocI3.jpg" alt="img_oman" width="400px" height="300px">
                <h2>Jardin Marjorelle</h2>
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
