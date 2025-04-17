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

let hebergement, transportInputs, restoInputs, activiteInputs, prixBase, prixAffichage;

function recalculerPrix() {
    let total = parseFloat(prixBase.value); // on récupère le prix de base en nombre

    total += tarifs.hebergement[hebergement.value] * 7;

    for (let i = 0; i < 7; i++) {
        const t = transportInputs[i].value;
        const r = restoInputs[i].value;
        const a = activiteInputs[i].value;

        total += tarifs.transport[t] + tarifs.restauration[r] + tarifs.activites[a];
    }

    prixAffichage.textContent = "Prix: " + total + "€";
}

document.addEventListener("DOMContentLoaded", function () {
    hebergement = document.querySelector('select[name="hebergement"]');
    transportInputs = document.querySelectorAll('select[name^="transports"]');
    restoInputs = document.querySelectorAll('select[name^="restauration"]');
    activiteInputs = document.querySelectorAll('select[name^="activites"]');
    prixBase = document.getElementById("prix-base");
    prixAffichage = document.getElementById("prix-affichage");

    // Appel de recalculerPrix si les selects changent
    let selects = document.querySelectorAll("select");
    for (let i = 0; i < selects.length; i++) {
        selects[i].addEventListener("change", recalculerPrix);
    }
});