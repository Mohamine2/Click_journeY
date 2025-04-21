function filtrerVoyages() {
    const recherche = document.getElementById("mot_cle")?.value.trim().toLowerCase() || "";

    // Prix min et max
    const prixMinValue = document.getElementById("prixMin").value;
    const prixMaxValue = document.getElementById("prixMax").value;
    const prixMin = prixMinValue ? parseFloat(prixMinValue) : 0;
    const prixMax = prixMaxValue ? parseFloat(prixMaxValue) : Infinity;

    // Mois sélectionné
    const moisSelectionne = document.getElementById("moisSelect")?.value || ""; // "01" à "12" ou ""

    const container = document.getElementById("voyageContainer");
    const voyages = Array.from(container.getElementsByClassName("voyage-icone"));

    const filtres = voyages.filter(voyage => {
        const dest = (voyage.dataset.destination || "").toLowerCase();
        const prix = parseFloat(voyage.dataset.prix);
        const dateDepart = voyage.dataset.date_depart || ""; // Exemple : "12/05/2025"

        // Extraire le mois
        const mois = dateDepart.split("/")[1]; // "05" par exemple

        const matchDestination = recherche === "" || dest.includes(recherche);
        const matchPrixMin = prix >= prixMin;
        const matchPrixMax = prix <= prixMax;
        const matchMois = moisSelectionne === "" || mois === moisSelectionne;

        return matchDestination && matchPrixMin && matchPrixMax && matchMois;
    });

    // Tri
    const tri = document.getElementById("triSelect")?.value;
    if (tri === "croissant") {
        filtres.sort((a, b) => parseFloat(a.dataset.prix) - parseFloat(b.dataset.prix));
    } else if (tri === "decroissant") {
        filtres.sort((a, b) => parseFloat(b.dataset.prix) - parseFloat(a.dataset.prix));
    }

    // Réinitialiser et afficher
    container.innerHTML = '';
    if (filtres.length === 0) {
        const msg = document.createElement("p");
        msg.textContent = "Aucun voyage ne correspond à votre recherche.";
        container.appendChild(msg);
    } else {
        filtres.forEach(voyage => container.appendChild(voyage));
    }

    // Logs pour debug
    console.log("Recherche:", recherche);
    console.log("PrixMin:", prixMin, "PrixMax:", prixMax);
    console.log("Mois sélectionné:", moisSelectionne);
    console.log("Voyages trouvés:", voyages.length);
    console.log("Voyages filtrés:", filtres.length);
}

document.addEventListener("DOMContentLoaded", () => {
    const bouton = document.getElementById("bouton-filtre");
    filtrerVoyages();

    if (bouton) {
        bouton.addEventListener("click", filtrerVoyages);
    }
});
