document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-modification");
    const loader = document.getElementById("loader");
    const ok = document.getElementById("ok");

    if (!form) return;

    form.addEventListener("submit", async (e) => {
        e.preventDefault(); // Empêche la soumission classique

        loader.style.display = "inline";
        ok.style.display = "none";

        const formData = new FormData(form);

        try {
            const response = await fetch("enregistrer_modification.php", {
                method: "POST",
                body: formData
            });

            const result = await response.text();

            loader.style.display = "none";

            if (response.ok && result.trim() === "OK") {
                ok.textContent = "Modifié";
                ok.style.color = "green";
                ok.style.display = "inline";

                // Attendre 2 secondes puis rediriger
                setTimeout(() => {
                    // Récupérer le numéro de page éventuellement dans un champ caché
                    const page = form.querySelector('input[name="page"]')?.value || 1;
                    window.location.href = `admin.php?page=${page}&modif=ok`;
                }, 2000);
            } else {
                ok.textContent = "Erreur: " + result;
                ok.style.color = "red";
                ok.style.display = "inline";
            }

        } catch (error) {
            loader.style.display = "none";
            ok.textContent = "Échec AJAX";
            ok.style.color = "red";
            ok.style.display = "inline";
            console.error("Erreur AJAX :", error);
        }
    });
});
