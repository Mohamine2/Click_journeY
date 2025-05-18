<?php
session_start(); // Démarrer la session

// Vérifier si une recherche a été soumise
$searchQuery = isset($_GET['q']) ? $_GET['q'] : '';

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

$json = file_get_contents('donnees/commandes.json');
$voyages = json_decode($json, true);

$json2 = file_get_contents('donnees/panier.json');
$paniers = json_decode($json2,true);

//cas date
$date_formatee = "Indisponible";
if (!empty($utilisateur["date_inscription"])) {
    $date_complete = $utilisateur["date_inscription"]; // ex: "18-04-2025 00:45:55"
    $date_seule = explode(" ", $date_complete)[0];     // "18-04-2025"
    $date_formatee = str_replace("-", "/", $date_seule); // "18/04/2025"
}

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  <script src="profil.js"></script>
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
        <?php if(!isset($_SESSION["utilisateur"])): ?>
            <li><a href="connexion.php"> Connectez-vous</a></li>
            <?php endif; ?>
        <li><a href="profil.php"> Mon profil</a></li>
        <li><a href="presentation.php"> A propos de nous </a></li>
        <?php if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]["role"] === "admin"): ?>
            <li><a href="admin.php">Espace Admin</a></li>
        <?php endif; ?>
      </ul>
      <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
      </form>
    </nav>

    <div class="conteneur_compte">
      <p class="compte">Bonjour, <?php echo htmlspecialchars($utilisateur["prenom"] . " " . $utilisateur["nom"]); ?> !</p>
      <div id="info">
        <p><b>Mes informations personnelles:</b></p>

        
        <form method="POST" action="modifier_profil.php" id="form-profil">

  <div class="champ-non-editable">
   <label>Email :</label>
   <input type="email" name="email" value="<?= htmlspecialchars($utilisateur["email"]) ?>" readonly>
  </div>

  <div class="champ-non-editable">
  <label>Numéro :</label>
   <input type="numero" name="numero" value="<?= htmlspecialchars($utilisateur["numero"]) ?>" readonly>
  </div>


  <div class="champ-editable">
    <label>Nom :</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($utilisateur["nom"]) ?>" readonly>
    <button type="button" class="modifier">Modifier</button>
    <button type="button" class="valider" style="display:none;">Valider</button>
    <button type="button" class="annuler" style="display:none;">Annuler</button>
  </div>
<br>
  <div class="champ-editable">
    <label>Prénom :</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($utilisateur["prenom"]) ?>" readonly>
    <button type="button" class="modifier">Modifier</button>
    <button type="button" class="valider" style="display:none;">Valider</button>
    <button type="button" class="annuler" style="display:none;">Annuler</button>
  </div>


    <button type="submit" id="Soumettre" style="display:none;">Soumettre les modifications</button>
    


</form>
        <p style="margin-bottom: 0px;"><b>Date d'inscription</b></p>
        <p style="margin-top: 0px;"> <?= htmlspecialchars($date_formatee) ?></p>
              

      </div>
      <div class ="achat">
        <p> <b> PANIER: </b> </p>
      </div>
        <?php
            foreach($paniers as $panier):
        ?>
        <?php
                if($panier['email'] == $utilisateur["email"]):
        ?>
          <div class="voyage-container">
              <div class="voyage-icone">
                  <div class="voyage-info">
                      <h3><?= htmlspecialchars($panier['destination']) ?></h3>
                      <p><strong>Prix :</strong> <?= htmlspecialchars($panier['prix']) ?> €</p>
                      <p> Ajouté au panier le <?= htmlspecialchars($panier['date_ajout']) ?></p>
                      <a href="voyages.php?dest=<?= urlencode($panier['destination']) ?>" class="voyage-link">Voir plus</a>
                  </div>
              </div>
          </div>

        <?php endif; ?>
        <?php endforeach; ?>
      <div class ="achat">
        <p><b>MES COMMANDES:</b></p>
        </div>
        <?php foreach ($voyages as $voyage): ?>
    <?php if ($voyage['nom'] == $utilisateur["nom"]): ?>
        <div class="voyage-container">
            <div class="voyage-icone">
                <div class="voyage-info">
                    <h3><?= htmlspecialchars($voyage['destination']) ?></h3>
                    <p><strong>Prix :</strong> <?= htmlspecialchars($voyage['prix']) ?> €</p>
                    <p><strong>Date de commande :</strong> <?= htmlspecialchars($voyage['date_commande']) ?></p>
                    <a href="voyages.php?dest=<?= urlencode($voyage['destination']) ?>" class="voyage-link">Voir plus</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
    </div>
    <div class="logout">
    <form method="post">
    <button class="logout" type="submit" name="deconnexion">Déconnexion</button>
</form>
    </div>

    <footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>

    <script src="mode_sombre.js"></script>
  </body>
</html>
