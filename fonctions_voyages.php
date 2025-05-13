<?php

function calculPrix($hebergement, $aeroport_depart, $aeroport_retour, $activites, $transports, $restauration,$prix_base,$jours, $nb_personnes) {

     // Tarifs hébergement par nuit
     $tarifs_hebergement = [
        "Hotel" => 100,
        "Maison d'hotes" => 0,
        "Appartement" => 70
    ];

    // Tarifs transport par jour
    $tarifs_transport = [
        "Autonome" => 0,
        "navette" => 15,
        "taxindiv" => 30
    ];

    // Tarifs restauration par jour
    $tarifs_restauration = [
        "Aucune" => 0,
        "Demi-pension" => 20,
        "Pension complète" => 40
    ];

    // Tarifs activités par jour
    $tarifs_activites = [
        "Oui" => 50,
        "Non" => 0
    ];

    // Calcul du prix de l'hébergement (7 nuits)
    $prix_total = $prix_base+($tarifs_hebergement[$hebergement] * 7);

    // Calcul des frais journaliers (transport, restauration, activités)
    for ($i = 1; $i <= $jours; $i++) {
        $prix_total += $tarifs_transport[$transports[$i]];
        $prix_total += $tarifs_restauration[$restauration[$i]];
        $prix_total += $tarifs_activites[$activites[$i]];
    }

    return $nb_personnes * $prix_total;
}

?>