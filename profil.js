document.addEventListener("DOMContentLoaded", () => {
  const champsEditables = document.querySelectorAll(".champ-editable");
  const boutonSoumettre = document.getElementById("Soumettre");
  let modificationValidee = false;

  champsEditables.forEach(champ => {
      const input = champ.querySelector("input");
      const boutonModifier = champ.querySelector(".modifier");
      const boutonValider = champ.querySelector(".valider");
      const boutonAnnuler = champ.querySelector(".annuler");

      let ancienneValeur = input.value;

      boutonModifier.addEventListener("click", () => {
          input.removeAttribute("readonly");
          boutonModifier.style.display = "none";
          boutonValider.style.display = "inline";
          boutonAnnuler.style.display = "inline";
          ancienneValeur = input.value;
      });

      boutonAnnuler.addEventListener("click", () => {
          input.value = ancienneValeur;
          input.setAttribute("readonly", true);
          boutonModifier.style.display = "inline";
          boutonValider.style.display = "none";
          boutonAnnuler.style.display = "none";
      });

      boutonValider.addEventListener("click", () => {
          input.setAttribute("readonly", true);
          boutonModifier.style.display = "inline";
          boutonValider.style.display = "none";
          boutonAnnuler.style.display = "none";

          modificationValidee = true;
          boutonSoumettre.style.display = "inline";
      });
  });

  document.getElementById("form-profil").addEventListener("submit", function (e) {
      e.preventDefault(); // Empêche le rechargement de la page

      const formData = new FormData(this);

      fetch("modifier_profil.php", {
          method: "POST",
          body: formData
      })
      .then(response => response.json())
      .then(data => {
          if (data.succes) {
              alert("Modifications enregistrées avec succès !");
              boutonSoumettre.style.display = "none";
          } else {
              alert("Erreur : " + data.message);
          }
      })
      .catch(error => {
          console.error("Erreur lors de l'envoi du formulaire :", error);
          alert("Une erreur est survenue lors de la communication avec le serveur.");
      });
  });
});
