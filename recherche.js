
function filtrerVoyages() {
    const recherche = document.getElementById("mot_cle").value.trim().toLowerCase();

    // Récupérer les prix minimum et maximum
    const prixMinValue = document.getElementById("prixMin").value;
    const prixMaxValue = document.getElementById("prixMax").value;

    const prixMin = prixMinValue ? parseFloat(prixMinValue) : 0; // Si vide, mettre à 0
    const prixMax = prixMaxValue ? parseFloat(prixMaxValue) : Infinity; // Si vide, mettre à infini

    const container = document.getElementById("voyageContainer");
    const voyages = Array.from(container.getElementsByClassName("voyage-icone"));

    const filtres = voyages.filter(voyage => {
        const dest = (voyage.dataset.destination || "").toLowerCase();
        const prix = parseFloat(voyage.dataset.prix);
        console.log(voyage.dataset.prix);

        const matchDestination = !recherche || dest.includes(recherche);
        const matchPrixMin = prix >= prixMin;
        const matchPrixMax = prix <= prixMax;

        return matchDestination && matchPrixMin && matchPrixMax;
    });

    const tri = document.getElementById("triSelect").value;

    // Tri si demandé
    if (tri === "croissant") {
        filtres.sort((a, b) => parseFloat(a.dataset.prix) - parseFloat(b.dataset.prix));
    } else if (tri === "decroissant") {
        filtres.sort((a, b) => parseFloat(b.dataset.prix) - parseFloat(a.dataset.prix));
    }
    

    // Réinitialise le container
    container.innerHTML = '';

    // Si aucun résultat
    if (filtres.length === 0) {
        const msg = document.createElement("p");
        msg.textContent = "Aucun voyage ne correspond à votre recherche.";
        container.appendChild(msg);
    } else {
        filtres.forEach(voyage => container.appendChild(voyage));
    }
    console.log("Recherche:", recherche);
console.log("PrixMin:", prixMin, "PrixMax:", prixMax);
console.log("Voyages trouvés:", voyages.length);
console.log("Voyages filtrés:", filtres.length);
}

document.getElementById("prixMin").addEventListener("change", filtrerVoyages);
document.getElementById("prixMin").addEventListener("input", filtrerVoyages);
document.getElementById("triSelect").addEventListener("change", filtrerVoyages);
document.getElementById("triSelect").addEventListener("input", filtrerVoyages);
document.getElementById("prixMax").addEventListener("change", filtrerVoyages);
document.getElementById("prixMax").addEventListener("input", filtrerVoyages);
window.addEventListener("DOMContentLoaded", filtrerVoyages);
