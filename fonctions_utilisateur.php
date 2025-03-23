<?php

function creation_utilisateur(){
    if (isset($_POST["inscription"])) {

        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $mdp2 = $_POST["mdp2"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $num = $_POST["telephone"];
        $role= "utilisateur";


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

            // Fichier JSON où les utilisateurs sont stockés
            $fichier = "utilisateurs.json";
        
            // Récupérer les données existantes
            $utilisateurs = [];
            if (file_exists($fichier)) {
                $json_data = file_get_contents($fichier);
                $utilisateurs = json_decode($json_data, true) ?? []; // Décoder en tableau associatif
            }
        
            // Nouvel utilisateur
            $nouvel_utilisateur = [
                "nom" => $nom,
                "prenom" => $prenom,
                "numero" => $num,
                "email" => $mail,
                "mot_de_passe" => password_hash($mdp, PASSWORD_DEFAULT), // Hash du mot de passe
                "role" => $role
            ];
        
            // Ajouter le nouvel utilisateur
            $utilisateurs[] = $nouvel_utilisateur;
        
            // Sauvegarder dans le fichier JSON
            file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
        
            echo "Utilisateur enregistré avec succès !";
        

        //rediriger le client sur la page profil

        header("Location: profil.php");
        }
    }
}

?>