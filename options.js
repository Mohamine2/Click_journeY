document.addEventListener("DOMContentLoaded", () => {
    const optionsConfig = {
        hebergement: [
            { value: "Hotel", label: "Hôtel" },
            { value: "Maison d'hotes", label: "Maison d'hôtes", selected: true },
            { value: "Appartement", label: "Appartement" }
        ],
        aeroport_depart: [
            { value: "Paris", label: "Paris", selected: true },
            { value: "Marseille", label: "Marseille" },
            { value: "Lyon", label: "Lyon" }
        ],
        aeroport_retour: [
            { value: "Paris", label: "Paris", selected: true },
            { value: "Marseille", label: "Marseille" },
            { value: "Lyon", label: "Lyon" }
        ],
        activites: [
            { value: "Oui", label: "Oui" },
            { value: "Non", label: "Non", selected: true }
        ],
        transports: [
            { value: "Autonome", label: "Autonome", selected: true },
            { value: "navette", label: "Navette collective" },
            { value: "Taxi individuel", label: "Taxis individuels" }
        ],
        restauration: [
            { value: "Aucune", label: "Aucune", selected: true },
            { value: "Demi-pension", label: "Demi-pension" },
            { value: "Pension complète", label: "Pension complète" }
        ]
    };

    // Fonction pour remplir dynamiquement un select avec des options
    function remplirSelect(selectId, options) {
        const selectElement = document.getElementById(selectId);

        options.forEach(option => {
            const optionElement = document.createElement("option");
            optionElement.value = option.value;
            optionElement.textContent = option.label;
            if (option.selected) optionElement.selected = true;
            selectElement.appendChild(optionElement);
        });
    }

    // Remplir les selects pour l'hébergement, aéroports, activités, etc.
    remplirSelect("hebergement", optionsConfig.hebergement);
    remplirSelect("aeroport_depart", optionsConfig.aeroport_depart);
    remplirSelect("aeroport_retour", optionsConfig.aeroport_retour);

    // Remplir les selects pour les activités, transports, restauration pour chaque jour
    const nbJours = parseInt(document.getElementById("duree").value);
    for (let i = 1; i <= nbJours; i++) {
        remplirSelect(`activites_${i}`, optionsConfig.activites);
        remplirSelect(`transports_${i}`, optionsConfig.transports);
        remplirSelect(`restauration_${i}`, optionsConfig.restauration);
    }
});
