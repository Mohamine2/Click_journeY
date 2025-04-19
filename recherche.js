
function filtrerVoyages(recherche) {
    const recherche = document.getElementById("mot_cle").value.trim().toLowerCase();
    const prixMin = parseFloat(document.getElementById("prixMin").value);
    const prixMax = parseFloat(document.getElementById("prixMax").value);

    const container = document.getElementById("voyageContainer");
    const voyages = Array.from(container.getElementsByClassName("voyage-icone"));

    const filtres = voyages.filter(voyage => {
        const dest = (voyage.dataset.destination || "").toLowerCase();
        const prix = parseFloat(voyage.dataset.prix);

        const matchDestination = !recherche || dest.includes(recherche);
        const matchPrixMin = isNaN(prixMin) || prix >= prixMin;
        const matchPrixMax = isNaN(prixMax) || prix <= prixMax;

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
}
document.getElementById("prixMin").addEventListener("change", filtrerVoyages);
document.getElementById("triSelect").addEventListener("change", filtrerVoyages);
document.getElementById("prixMax").addEventListener("change", filtrerVoyages);
window.addEventListener("DOMContentLoaded", filtrerVoyages);