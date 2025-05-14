//addEventListerner charge tte la page avant le js

document.addEventListener("DOMContentLoaded", function () {

    // Sélectionne les formulaires
    const formInscription = document.querySelector(".form_inscription");
    const formConnexion = document.querySelector(".form_connexion");

    // fonction qui vérifie avec vert/rouge la validité
    function validerChamp(id, valid) {
        const champ = document.getElementById(id); // Trouve l'élément avec l'ID spécifié
        champ.classList.remove("input-valide", "input-invalide");
        champ.classList.add(valid ? "input-valide" : "input-invalide");
    }

    // fonction pour afficher les erreurs si false
    function afficherErreurs(erreurs) {
        if (erreurs.length > 0) {
            alert(erreurs.join("\n")); // afficher erreur avec tab->texte avec "join()"
            return false;
        }
        return true;
    }

    ////////////////////// cas formulaire inscription ////////////////////////////////
    if (formInscription) {

        // recupère les elements
        const champs = {
            nom: document.getElementById("nom"),
            prenom: document.getElementById("prenom"),
            telephone: document.getElementById("telephone"),
            mail: document.getElementById("mail"),
            mdp: document.getElementById("mdp"),
            mdp2: document.getElementById("mdp2")
        };

        // vérification de chaque données dans inscription
        formInscription.addEventListener("submit", function (e) {
            const erreurs = []; // tableau pour les erreurs

            //trim() permet d'enlever les espaves
            const nom = champs.nom.value.trim();
            const prenom = champs.prenom.value.trim();
            const tel = champs.telephone.value.trim();
            const mail = champs.mail.value.trim();
            const mdp = champs.mdp.value.trim();
            const mdp2 = champs.mdp2.value.trim();
        
            // Validation des champs (nom,prenom...)
            const nomOui = nom.length >= 2;
            validerChamp("nom", nomOui);
            if (!nomOui) erreurs.push("Le nom doit contenir au moins 2 lettres.");
        
            const prenomOui = prenom.length >= 2;
            validerChamp("prenom", prenomOui);
            if (!prenomOui) erreurs.push("Le prénom doit contenir au moins 2 lettres.");
        
            const telOui = /^(\+33|0)[1-9][0-9]{8}$/.test(tel); // Expression régulière pour valider un numéro de téléphone
            validerChamp("telephone", telOui);
            if (!telOui) erreurs.push("Numéro de téléphone invalide.");
        
            const mailOui = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail); // Expression régulière pour valider une adresse email
            validerChamp("mail", mailOui);
            if (!mailOui) erreurs.push("Adresse mail invalide.");
        
            const mdpOui = mdp.length >= 4; // condition pour validation du mdp
            validerChamp("mdp", mdpOui);
            if (!mdpOui) erreurs.push("Les mots de passe doivent contenir au moins 4 caractères.");
        
            const mdp2Oui = mdp === mdp2 && mdp2.length >= 4; // verification 2e mdp
            validerChamp("mdp2", mdp2Oui);
            if (!mdp2Oui) erreurs.push("Les mots de passe ne correspondent pas.");
        
            // affichage erreur & pas d'envoi formulaire
            if (erreurs.length > 0) {
                e.preventDefault();
                alert(erreurs.join("\n"));
            }
        });
        

        // validation en live des champs
        champs.nom.addEventListener("input", () => validerChamp("nom", champs.nom.value.trim().length >= 2));
        champs.prenom.addEventListener("input", () => validerChamp("prenom", champs.prenom.value.trim().length >= 2));
        champs.telephone.addEventListener("input", () => {
            validerChamp("telephone", /^(\+33|0)[1-9][0-9]{8}$/.test(champs.telephone.value.trim()));
        });
        champs.mail.addEventListener("input", () => {
            validerChamp("mail", /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(champs.mail.value.trim()));
        });
        champs.mdp.addEventListener("input", () => validerChamp("mdp", champs.mdp.value.trim().length >= 4));
        champs.mdp2.addEventListener("input", () => {
            validerChamp("mdp2", champs.mdp2.value.trim() === champs.mdp.value.trim() && champs.mdp2.value.trim().length >= 4);
        });
    }

    //////////////////////////// cas formulaire connexion //////////////////////////////
    if (formConnexion) {
        // on récupère les données de connexion
        const mailField = document.getElementById("mail");
        const mdpField = document.getElementById("mdp");

        // vérification de chaque données dans connexion
        formConnexion.addEventListener("submit", function (e) {
            const erreurs = [];
            const mail = mailField.value.trim();
            const mdp = mdpField.value.trim();

            const mailOui = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mail);
            const mdpOui = mdp.length >= 4;

            validerChamp("mail", mailOui);
            if (!mailOui) erreurs.push("Adresse mail invalide.");

            validerChamp("mdp", mdpOui);
            if (!mdpOui) erreurs.push("Les mots de passe doivent contenir au moins 4 caractères.");

            if (!afficherErreurs(erreurs)) e.preventDefault(); 
        });

        // validation live
        mailField.addEventListener("input", () => {
            validerChamp("mail", /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(mailField.value.trim()));
        });

        mdpField.addEventListener("input", () => {
            validerChamp("mdp", mdpField.value.trim().length >= 4);
        });
    }

    
//                      afficher / masquer les mots de passe

    document.querySelectorAll("input[type='password']").forEach(field => {
        
        const wrapper = document.createElement("div");
        wrapper.classList.add("input-wrapper"); 

        field.parentNode.insertBefore(wrapper, field); 
        wrapper.appendChild(field);

        const eye = document.createElement("img");
        eye.src = "images/oeil2.png"; // par défaut, mot de passe masqué
        eye.alt = "Afficher/Masquer le mot de passe";
        eye.classList.add("eye-icon");
        wrapper.appendChild(eye)

        // effet du clique (mode texte/mdp)
        eye.addEventListener("click", () => {
            const isPassword = field.type === "password";
            field.type = isPassword ? "text" : "password";
            eye.src = isPassword ? "images/oeil1.png" : "images/oeil2.png";

        });
    });
}); 