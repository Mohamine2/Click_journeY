<?php

session_start(); 


// Vérifier si l'utilisateur est connecté
if (isset($_SESSION["utilisateur"])) {
    // Rediriger vers la page de connexion si non connecté
    header("Location: profil.php");
    exit();
}

if(isset($_POST["connexion"])){

    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    if(empty($mail)){
        echo"Vous devez entrer une addresse mail";
    }
    else if(empty($mdp)){
        echo"Vous devez entrer un mot de passe";
    }
    else{
        $fichier = 'utilisateurs.json';

    if (!file_exists($fichier)) {
        die("Erreur : Le fichier JSON n'existe pas.");
    }

    $data = file_get_contents($fichier);
    $comptes = json_decode($data, true);

    if ($comptes === null) {
        die("Erreur : Impossible de décoder le fichier JSON.");
    }

    // Vérifier si l'email et le mot de passe correspondent
    foreach ($comptes as $compte) {
        if ($compte["email"] == $mail && password_verify($mdp, $compte["mot_de_passe"])) {
            // Stocker la session et rediriger vers la page protégée
            $_SESSION["utilisateur"] = $mail;
            header("Location: profil.php");
            exit();
        }
    }

    // Si aucun compte ne correspond
    echo "Email ou mot de passe incorrect.";
}
    }


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Connexion à Dunes Seekers</title>
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
        <input type="search" placeholder="Rechercher...">
    </nav>

    <div class="boite_connexion">
        <div class="connexion">
            <h3> Connexion </h3>
            <form class="form_connexion" method="post" action="connexion.php">
                <label for="mail"> Adresse Mail: </label>
                <input type="email" name="mail" id="mail" required />
                <label for="mdp"> Mot de passe: </label>
                <input type="password" name="mdp" id="mdp" required />
                <button type="submit" name="connexion"> Confirmer </button>
            </form>

            <p>Pas de compte ? </p>
            <a href="inscription.php"> Créer un compte</a>
        </div>
    </div>

 
</body>

</html> 
