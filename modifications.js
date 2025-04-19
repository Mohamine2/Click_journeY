document.addEventListener("DOMContentLoaded", () => {
    const button = document.getElementById("enregistrement");

    if (!button) return; // Sécurité si le bouton n'existe pas

    const form = button.closest("form"); // Trouve le formulaire parent du bouton

    button.addEventListener("click", (e) => {
        e.preventDefault(); // Empêche l'envoi immédiat

        // Désactive le bouton
        button.disabled = true;
        button.textContent = "Enregistrement...";
        button.style.opacity = "0.6";
        button.style.cursor = "not-allowed";

        // Attendre 2 secondes avant d'envoyer le formulaire
        setTimeout(() => {
            form.submit();
        }, 2000);
    });
});