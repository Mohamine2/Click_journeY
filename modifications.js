document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("form-modification");
    const loader = document.getElementById("loader");
    const ok = document.getElementById("ok");
    const supprimerBtn = document.getElementById("supprimer-btn");
    const enregistrerBtn = document.getElementById("enregistrer-btn");

    if (!form) return;

    

    form.addEventListener("submit", async (e) => {
        e.preventDefault(); // Empêche la soumission classique
        if (!confirm("Voulez-vous enregistrer ces modifications ?")) return;

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


    if (supprimerBtn) {
        supprimerBtn.addEventListener("click", async () => {
            if (!confirm("Voulez-vous vraiment supprimer cet utilisateur ?")) return;

            loader.style.display = "inline";
            ok.style.display = "none";

            const formData = new FormData();
            formData.append("id", form.querySelector('input[name="id"]').value);
            formData.append("action", "supprimer");

            try {
                const response = await fetch("enregistrer_modification.php", {
                    method: "POST",
                    body: formData
                });

                const result = await response.text();
                loader.style.display = "none";

                if (response.ok && result.trim() === "SUPPRIME") {
                    ok.textContent = "Supprimé";
                    ok.style.color = "green";
                    ok.style.display = "inline";

                    setTimeout(() => {
                        window.location.href = "admin.php?suppr=ok";
                    }, 2000);
                } else {
                    ok.textContent = "Erreur: " + result;
                    ok.style.color = "red";
                    ok.style.display = "inline";
                }

            } catch (error) {
                loader.style.display = "none";
                ok.textContent = "Erreur AJAX";
                ok.style.color = "red";
                ok.style.display = "inline";
                console.error("Erreur AJAX :", error);
            }
        });
    }
});

