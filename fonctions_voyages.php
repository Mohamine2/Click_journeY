<?php

function calculPrix($hebergement, $aeroport_depart, $aeroport_retour, $activites, $transports, $restauration) {

     // Tarifs hébergement par nuit
     $tarifs_hebergement = [
        "Hotel" => 100,
        "Maison d'hotes" => 50,
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

    // Tarifs aéroport
    $tarifs_aeroport = [
        "Paris" => 200,
        "Marseille" => 150,
        "Lyon" => 180
    ];

    // Calcul du prix de l'hébergement (7 nuits)
    $prix_total = $tarifs_hebergement[$hebergement] * 7;

    // Ajout des frais d’aéroport (aller-retour)
    $prix_total += $tarifs_aeroport[$aeroport_depart] + $tarifs_aeroport[$aeroport_retour];

    // Calcul des frais journaliers (transport, restauration, activités)
    for ($i = 1; $i <= 7; $i++) {
        $prix_total += $tarifs_transport[$transports[$i]];
        $prix_total += $tarifs_restauration[$restauration[$i]];
        $prix_total += $tarifs_activites[$activites[$i]];
    }

    return $prix_total;
}

?>