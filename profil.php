<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION["utilisateur"])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: connexion.php");
    exit();
}

if (isset($_POST["deconnexion"])) {
  // Rediriger vers la page de connexion si non connecté
  header("Location: deconnexion.php");
  exit();
}

$utilisateur = $_SESSION["utilisateur"];
?>

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
      <p class="compte">Bonjour, <?php echo htmlspecialchars($utilisateur["prenom"] . " " . $utilisateur["nom"]); ?> !</p>
      <div id="info">
        <p><b>Mes informations personnelles:</b></p>
        <p> Adresse mail: <?php echo htmlspecialchars($utilisateur["email"]); ?> </p>
        <p> Nom: <?php echo htmlspecialchars($utilisateur["nom"]); ?> </p>
        <p> Prénom: <?php echo htmlspecialchars($utilisateur["prenom"]); ?> </p>
        <p>Moyen de paiement: </p>
        <button type="submit" class="edit">Modifier le profil</button>
      </div>
      <div id="achat">
        <p><b>Mes envies:</b></p>
        <p>Favoris:</p>
        <p>Panier:</p>
      </div>
    </div>
    <div class="logout">
    <form method="post">
    <button class="logout" type="submit" name="deconnexion">Déconnexion</button>
</form>
    </div>
  </body>
</html>
