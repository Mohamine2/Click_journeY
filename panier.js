document.addEventListener("DOMContentLoaded", () => {
    const boutons = document.querySelectorAll(".panier");
  
    boutons.forEach((bouton) => {
      bouton.addEventListener("click", () => {
        //on récupère
        const destination = bouton.dataset.destination;
        const montant = bouton.dataset.montant; 

        fetch("panier.php", {
          method: "POST",
          //header permettant dire que c un type formulaire + lire les données $_POST
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          //envoi au php
          body: "destination=" + encodeURIComponent(destination) +
                "&montant=" + encodeURIComponent(montant)
        })
          .then(response => response.json())
          .then(data => {
            alert(data.message);
          })
          .catch(error => {
            console.error("Erreur :", error);
            alert("Une erreur s'est produite");
          });
      });
    });
});
