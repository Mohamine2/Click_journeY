const json_voyages = document.getElementById("json_voyages")?.value || "";

function recreerPageJS() {
    
    //gestion du fichier json
    let voyages = [];

    try {
        voyages = JSON.parse(json_voyages);
    } catch (e) {
        console.error("Erreur de parsing JSON :", e);
        return;
    }

    // Réinitialiser
    const container = document.getElementById("voyageContainer");
    container.innerHTML = '';

    const paginationContainer = document.getElementById("pagination");
    paginationContainer.innerHTML = '';


    const recherche = document.getElementById("mot_cle")?.value.trim().toLowerCase() || "";
    const prixMinValue = document.getElementById("prixMin").value;
    const prixMaxValue = document.getElementById("prixMax").value;
    const prixMin = prixMinValue ? parseFloat(prixMinValue) : 0;
    const prixMax = prixMaxValue ? parseFloat(prixMaxValue) : Infinity;
    const duree_selectionne = parseInt(document.getElementById("duree_value")?.value);
    const moisSelectionne = document.getElementById("moisSelect")?.value || "";

    // Tri
    const tri = document.getElementById("triSelect")?.value;
    if (tri === "croissant") {
        voyages.sort((a, b) => parseFloat(a.prix) - parseFloat(b.prix));
    } else if (tri === "decroissant") {
        voyages.sort((a, b) => parseFloat(b.prix) - parseFloat(a.prix));
    }

    let voyages_affiches = 0;

    for (let voyage of voyages) {

        const dest = (voyage.destination || "").toLowerCase();
        const prix = parseFloat(voyage.prix);
        const dateDepart = voyage.date_depart || "";
        const duree = parseInt(voyage.duree) || "";

        // Extraire le mois
        const mois = dateDepart?.split("/")?.[1] || "";

        const matchDestination = recherche === "" || dest.includes(recherche);
        const matchPrixMin = prix >= prixMin;
        const matchPrixMax = prix <= prixMax;
        const matchMois = moisSelectionne === "" || mois === moisSelectionne;
        const matchDuree = isNaN(duree_selectionne) || duree === duree_selectionne;

        if(matchDestination && matchPrixMin && matchPrixMax && matchMois && matchDuree){

        const voyageElement = document.createElement('div');
        voyageElement.classList.add('voyage-icone');
        voyageElement.setAttribute('data-destination', voyage.destination);
        voyageElement.setAttribute('data-prix', voyage.prix);
        voyageElement.setAttribute('data-date_depart', voyage.date_depart);
        voyageElement.setAttribute('data-duree', voyage.duree);

        voyageElement.innerHTML = `
            <div class="voyage-info">
                <img src="${voyage.image}" alt="${voyage.destination}" class="voyage-image">
                <h3>${voyage.destination}</h3>
                <p><strong>Départ :</strong> ${voyage.depart}</p>
                <p><strong>Prix :</strong> ${voyage.prix} €</p>
                <p><strong>Date :</strong> ${voyage.date_depart}</p>
                <p><strong>Durée :</strong> ${voyage.duree}</p>
                <a href="voyages.php?dest=${encodeURIComponent(voyage.destination)}" class="voyage-link">Voir plus</a>
            </div>
        `;

        container.appendChild(voyageElement);
        voyages_affiches++;
        }
    }

    if (voyages_affiches === 0) {
        const msg = document.createElement("p");
        msg.textContent = "Aucun voyage ne correspond à votre recherche.";
        container.appendChild(msg);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const bouton = document.getElementById("bouton-filtre");

    if (bouton) {
        bouton.addEventListener("click", recreerPageJS);
    }
});