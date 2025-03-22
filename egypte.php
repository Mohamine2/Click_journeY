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
    <title>Egypte - Dunes Seekers</title>
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
            <h1>A travers des pyramides aux merveilles du désert, l'Egypte.</h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Le Caire</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours du Caire, notamment des Pyramides de Gizeh et du Sphinx et ce
                         jusqu'au soir.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>L'Oasis de Dakhla</h3>
                    <p>Une journée détendu et culturelle où vous allez pouvoir vous baigner dans une source chaude.
                        Et découvrir des ruines médiévales et pharaoniques.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Désert Blanc</h3>
                    <p>En route en 4x4 pour le Désert Blanc, vous allez pouvoir faire l'exploration des formations rocheuses
                        impréssionnantes et avoir une nuit sous les étoiles.
                        </p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Abou Simbel</h3>
                    <p>Départ pour Abou Simbel, où vous allez pouvoir faire la visite 
                    du Grand Temple de Ramsès II et du Temple de Néfertari.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Louxor</h3>
                    <p>En chemain pour Louxor, où vous allez pouvoir faire la visite 
                       Vallée des Rois et du Temple de Karnak.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Djanet & Tassili n'Ajjer</h3>
                    <p>Retour au Caire pour découvrir de nouveaux les plats et boissons traditionnels puis enchaînez avec une visite avec du bazar khan el-Khalili
                        et le Musée Egyptien.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Détente et départ</h3>
                    <p>Pour votre dernière journée, faites vos derniers achats et visiter la Citadelle Saladin
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/egypte1.jpg" alt="img_egypte" width="400px" height="300px">
                <h2>Grand temple d'Abou Simbel</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/egypte2.jpg" alt="img_egypte" width="400px" height="300px">
                <h2>Citadelle de Saladin</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/egypte3.jpg" alt="img_egypte" width="400px" height="300px">
                <h2>Musée Egyptien</h2>
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
