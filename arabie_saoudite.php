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
    <title>Arabie Saoudite - Dunes Seekers</title>
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
            <h1>Votre voyage désertique au sein de l'Arabie Saoudite et de son patrimoine historique. </h1>
    </section>

    <!-- Séjour -->
    <section class="onglets">
        <div class="tab-container">
            <input type="radio" name="option" id="jour1" checked class="destination"/>
            <label for="jour1">
                <div class="tab-name">Jour 1</div>
                <div class="tab-content">
                    <h3>Arrivé à Riyad</h3>
                    <p>A votre arrivée, 
                        vous serez accueillis par le guide (fancophone/anglophone) qui sera votre compagnon de voyage pour le reste du séjour. Il vous donnera les meilleurs renseignements et pourra répondre
                        à toutes vos questions. Il vous fera visiter les alentours de Riyad, notamment site le centre historique
                        et une premenade dans le souk.</p>
                </div>

            </label>
    
            <input type="radio" name="option" id="jour2" class="destination"/>
            <label for="jour2">
                <div class="tab-name">Jour 2</div>
                <div class="tab-content">
                    <h3>Désert de Riyad</h3>
                    <p>Excursion dans le désert pour admirer le célèbre Edge of the World.
                    Suivis d'une expérience en 4x4 et observation du coucher de soleil sur les falaises majestueuses.</p>
                </div>
            </label>
    
            <input type="radio" name="option" id="jour3" class="destination"/>
            <label for="jour3">
                <div class="tab-name">Jour 3</div>
                <div class="tab-content">
                    <h3>Al-Ula</h3>
                    <p>Visite d'Al-Ula et de son incroyable site archéologique Hegra (Madâin Sâlih),
                    classé au patrimoine mondial de l'UNESCO.           </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour4" class="destination"/>
            <label for="jour4">
                <div class="tab-name">Jour 4</div>
                <div class="tab-content">
                    <h3>Jabal Ikmah</h3>
                    <p>Exploration de Jabal Ikmah, une vallée rocheuse célèbre pour ses inscriptions anciennes,
                    considérée comme une immense bibliothèque à ciel ouvert.        </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour5" class="destination"/>
            <label for="jour5">
                <div class="tab-name">Jour 5</div>
                <div class="tab-content">
                    <h3>Diriyah</h3>
                    <p>Visite de Diriyah, le berceau historique de l'Arabie Saoudite, avec ses bâtiments en briques d'argile
                    et ses musées retraçant l'histoire du pays.</p>
                </div>
            </label>

            <input type="radio" name="option" id="jour6" class="destination"/>
            <label for="jour6">
                <div class="tab-name">Jour 6</div>
                <div class="tab-content">
                    <h3>Musée & culture</h3>
                    <p>Faites la visite du Musée Abdul Raoul Khalil retraçant l'histoire de lArabie Saoudite avec des artefacts anciens.
                        Et ensuite explorer des spécialités locales dans les restaurants traditionnels.
                    </p>
                </div>
            </label>

            <input type="radio" name="option" id="jour7" class="destination"/>
            <label for="jour7">
                <div class="tab-name">Jour 7</div>
                <div class="tab-content">
                    <h3>Boutique & départ</h3>
                    <p>Journée relaxante pour faire ses derniers achats en Arabie Saoudite et avoir du temps libre
                        avant d'aller prendre l'avion pour revenir en France.
                    </p>
                </div>
            </label>
            
        </div>

        
    <!--Images-->    
    </section>
    
        <div class="lieu-contenant">
        <div class="lieu">
                <img src="images/arabie_saoudite1.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Edge of the World</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/arabie_saoudite2.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Al-Ula</h2>
            </a>
        </div>
        <div class="lieu">
                <img src="images/arabie_saoudite3.jpg" alt="img_arabie_saoudite" width="400px" height="300px">
                <h2>Dariyah</h2>
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
