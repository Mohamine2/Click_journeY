document.addEventListener("DOMContentLoaded", () => {
  const champs = document.querySelectorAll(".champ-editable");  // prends les 2 types de blocs
    const Soumettre = document.getElementById("Soumettre");
    let modifications = new Set();
  
    champs.forEach(champ => {
      const input = champ.querySelector("input");
      const Modifier = champ.querySelector(".modifier");
      const Valider = champ.querySelector(".valider");
      const Annuler = champ.querySelector(".annuler");
      const valeurInitiale = input.value;
  
      Modifier.addEventListener("click", () => {
        input.disabled = false;
        Modifier.style.display = "none";
        Valider.style.display = "inline";
        Annuler.style.display = "inline";
      });
  
      Annuler.addEventListener("click", () => {
        input.value = valeurInitiale;
        input.disabled = true;
        Modifier.style.display = "inline";
        Valider.style.display = "none";
        Annuler.style.display = "none";
        modifications.delete(input.name);
        Soumettre.style.display = modifications.size > 0 ? "block" : "none";
      });
  
      Valider.addEventListener("click", () => {
        input.disabled = true;
        Modifier.style.display = "inline";
        Valider.style.display = "none";
        Annuler.style.display = "none";
  
        if (input.value !== valeurInitiale) {
          modifications.add(input.name);
        } else {
          modifications.delete(input.name);
        }
  
        Soumettre.style.display = modifications.size > 0 ? "block" : "none";
      });
    });
  
    // Réactive les champs avant envoi du formulaire
    const form = document.getElementById("form-profil");
    form.addEventListener("submit", () => {
      champs.forEach(champ => {
        const input = champ.querySelector("input");
        input.disabled = false;
      });
    });
  });
  