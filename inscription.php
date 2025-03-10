<?php

if (isset($_POST["inscription"])) {

    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $mdp2 = $_POST["mdp2"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $num = $_POST["telephone"];

    $messages = [];

    //Vérif des champs
    if (empty($mail)) {
        $messages[] = "Vous devez entrer une adresse mail";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $messages[] = "L'adresse mail n'est pas valide";
    }

    if (empty($mdp)) {
        $messages[] = "Vous devez entrer un mot de passe";
    }

    if ($mdp != $mdp2) {
        $messages[] = "Erreur, les mots de passe sont différents";
    }

    if (empty($nom)) {
        $messages[] = "Vous devez entrer un nom";
    }

    if (empty($prenom)) {
        $messages[] = "Vous devez entrer un prénom";
    }

    if (empty($num)) {
        $messages[] = "Vous devez entrer un numéro de téléphone";
    }

    //afficher les msg d'erreurs s'il y en a
    if (!empty($messages)) {
        foreach ($messages as $message) {
            echo "<p style='color: red;'>$message</p>";
        }
    } else {
    
    //écrire dans le fichier s'il n'y a pas d'erreur
    $fichier = fopen('comptes.txt', 'a+');

    if (!$fichier) {
        die("Erreur : Impossible d'ouvrir ou de créer le fichier.");
    }

    if (filesize('comptes.txt') == 0) {
        fwrite($fichier, "#nom-prenom-mail-telephone-mdp\n");
    }

    fwrite($fichier, "{$nom}-{$prenom}-{$mail}-{$num}-{$mdp}\n");

    fclose($fichier);

    //rediriger le client sur la page profil

    header("Location: profil.php");
}
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Inscription à Dunes Seekers</title>
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


    <div class="boite_inscription">
        <h3> Formulaire d'inscription </h3>
        <form method="post" class="form_inscription" action="inscription.php">
            <label for="nom"> Nom: </label>
            <input type="text" name="nom" id="nom" required />
            <label for="prenom"> Prénom: </label>
            <input type="text" name="prenom" id="prenom" required />
            <label for="telephone"> Téléphone: </label>
            <input type="tel" id="telephone" name="telephone" pattern="(\+33|0)[1-9][0-9]{8}"
                placeholder="+33 6 12 34 56 78" required>
            <label for="mail"> Adresse Mail: </label>
            <input type="email" name="mail" id="mail" required />
            <label for="mdp"> Création Mot de passe: </label>
            <input type="password" name="mdp" id="mdp" required />
            <label for="mdp"> Confirmer Mot de passe: </label>
            <input type="password" name="mdp2" id="mdp2" required />
            <button type="submit" name="inscription"> Confirmer </button>
        </form>
    </div>


</body>

</html>