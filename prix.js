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

function recalculerPrixXML() {
    let total = parseFloat(prixBase.value) || 0;
    let jours = parseInt(document.getElementById("duree").value);
    let nb_personnes = parseInt(nb_personnes_input.value);

    if (isNaN(nb_personnes) || nb_personnes < 1) {
        nb_personnes = 1;
    }

    // Création du XML
    let xml = `<donnees>
        <prixBase>${total}</prixBase>
        <jours>${jours}</jours>
        <nb_personnes>${nb_personnes}</nb_personnes>
        <hebergement>${hebergement.value}</hebergement>
        <joursDetails>`;

    for (let i = 0; i < jours; i++) {
        const t = transportInputs[i].value;
        const r = restoInputs[i].value;
        const a = activiteInputs[i].value;

        xml += `
            <jour index="${i}">
                <transport>${t}</transport>
                <restauration>${r}</restauration>
                <activite>${a}</activite>
            </jour>
        `;
    }

    xml += `</joursDetails></donnees>`;

    // Envoi AJAX
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            document.getElementById("prix-affichage").innerHTML = this.responseText;
        }
    };
    xhr.open("POST", "calcul.php", true);
    xhr.setRequestHeader("Content-Type", "text/xml");
    xhr.send(xml);
}

document.addEventListener("DOMContentLoaded", function () {
    nb_personnes_input = document.getElementById("nb_personnes");
    prixAffichage = document.getElementById("prix-affichage");
    hebergement = document.querySelector('select[name="hebergement"]');
    transportInputs = document.querySelectorAll('select[name^="transports"]');
    restoInputs = document.querySelectorAll('select[name^="restauration"]');
    activiteInputs = document.querySelectorAll('select[name^="activites"]');
    prixBase = document.getElementById("prix-base");

    let selects = document.querySelectorAll("select");
    for (let i = 0; i < selects.length; i++) {
        selects[i].addEventListener("change", recalculerPrixXML);
    }

    nb_personnes_input.addEventListener("input",recalculerPrixXML);
});
