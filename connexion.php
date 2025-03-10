<?php


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
        echo"Bienvenue {$mail}!";
    }

    $fichier = fopen('comptes.txt', 'r');
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
