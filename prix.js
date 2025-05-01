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


let hebergement, transportInputs, restoInputs, activiteInputs, prixBase, prixAffichage, nb_personnes_input;

function recalculerPrix() {
    let total = parseFloat(prixBase.value) || 0;
    let jours = parseInt(document.getElementById("duree").value);

    let nb_personnes = parseInt(nb_personnes_input.value);

    if (isNaN(nb_personnes) || nb_personnes < 1) {
        nb_personnes = 1;  // valeur par défaut si ce n'est pas un nombre
    }

    total += tarifs.hebergement[hebergement.value] * jours;

    for (let i = 0; i < jours; i++) {
        const t = transportInputs[i].value;
        const r = restoInputs[i].value;
        const a = activiteInputs[i].value;

        total += (tarifs.transport[t]) + (tarifs.restauration[r]) + (tarifs.activites[a]);
    }

    total *= nb_personnes;

    prixAffichage.textContent = "Prix: " + total + "€";
}

document.addEventListener("DOMContentLoaded", function () {
    nb_personnes_input = document.getElementById("nb_personnes");
    console.log(nb_personnes_input.value);
    prixAffichage = document.getElementById("prix-affichage");
    console.log(prixAffichage);
    hebergement = document.querySelector('select[name="hebergement"]');
    transportInputs = document.querySelectorAll('select[name^="transports"]');
    restoInputs = document.querySelectorAll('select[name^="restauration"]');
    activiteInputs = document.querySelectorAll('select[name^="activites"]');
    prixBase = document.getElementById("prix-base");

    let selects = document.querySelectorAll("select");
    for (let i = 0; i < selects.length; i++) {
        selects[i].addEventListener("change", recalculerPrix);
    }

    nb_personnes_input.addEventListener("input",recalculerPrix);
});
