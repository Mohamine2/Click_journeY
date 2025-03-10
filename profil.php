<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Profil - Dunes Seekers</title>
  </head>
  <body>
    <header>
      <a href="accueil.php"> Dunes Seekers </a>
    </header>

    <nav>
      <ul>
        <li><a href="accueil.php"> Accueil </a></li>
        <li><a href="recherche.php"> Recherche </a></li>
        <li><a href="connexion.php"> Connectez-vous</a></li>
        <li><a href="profil.php"> Mon profil</a></li>
        <li><a href="presentation.php"> A propos de nous </a></li>
      </ul>
      <input type="search" placeholder="Rechercher..." />
    </nav>

    <div class="conteneur_compte">
      <p class="compte">Bonjour, [nom de la personne connectée] !</p>
      <div id="info">
        <p><b>Mes informations personnelles:</b></p>
        <p>Nom:</p>
        <p>Prénom:</p>
        <p>Adresse mail:</p>
        <p>Moyen de paiement:</p>
        <button type="submit" class="edit">Modifier le profil</button>
      </div>
      <div id="achat">
        <p><b>Mes envies:</b></p>
        <p>Favoris:</p>
        <p>Panier:</p>
      </div>
    </div>
    <div class="logout">
      <button class="logout" type="submit">Déconnexion</button>
    </div>
  </body>
</html>
