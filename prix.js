// Tarifs identiques à ceux du PHP
const tarifs = {
    hebergement: {
        "Hotel": 100,
        "Maison d'hotes": 0,
        "Appartement": 70
    },
    transport: {
        "Autonome": 0,
        "navette": 15,
        "taxindiv": 30
    },
    restauration: {
        "Aucune": 0,
        "Demi-pension": 20,
        "Pension complète": 40
    },
    activites: {
        "Oui": 50,
        "Non": 0
    }
};


let hebergement, transportInputs, restoInputs, activiteInputs, prixBase, prixAffichage, adultes_input,enfants_input;

async function recalculerPrixJSON() {
    let total = parseFloat(prixBase.value) || 0;
    let jours = parseInt(document.getElementById("duree").value);
    let adultes = parseInt(adultes_input.value);
    let enfants = parseInt(enfants_input.value);

    if (isNaN(adultes) || adultes < 1) {
        adultes = 1;
    }

    if (isNaN(enfants) || enfants < 0) {
        enfants = 0;
    }

    // Création de l'objet à envoyer
    let donnees = {
        prixBase: total,
        jours: jours,
        adultes: adultes,
        enfants: enfants,
        hebergement: hebergement.value,
        joursDetails: []
    };

    for (let i = 0; i < jours; i++) {
        donnees.joursDetails.push({
            transport: transportInputs[i].value,
            restauration: restoInputs[i].value,
            activite: activiteInputs[i].value
        });
    }

    try {
        const response = await fetch('calcul.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(donnees)
        });

        if (!response.ok) throw new Error("Erreur HTTP : " + response.status);

        const prix = (await response.text()).trim();

        document.getElementById("prix-affichage").innerHTML = "Prix: " + prix + " €";
        document.getElementById("prix_affiche").value = prix;

    } catch (error) {
        console.error("Erreur lors de l'envoi de la requête :", error);
    }
}


document.addEventListener("DOMContentLoaded", function () {
    adultes_input = document.getElementById("adultes");
    enfants_input = document.getElementById("enfants");
    prixAffichage = document.getElementById("prix-affichage");
    hebergement = document.querySelector('select[name="hebergement"]');
    transportInputs = document.querySelectorAll('select[name^="transports"]');
    restoInputs = document.querySelectorAll('select[name^="restauration"]');
    activiteInputs = document.querySelectorAll('select[name^="activites"]');
    prixBase = document.getElementById("prix-base");

    let selects = document.querySelectorAll("select");
    for (let i = 0; i < selects.length; i++) {
        selects[i].addEventListener("change", recalculerPrixJSON);
    }

    adultes_input.addEventListener("input",recalculerPrixJSON);
    enfants_input.addEventListener("input",recalculerPrixJSON);
});
