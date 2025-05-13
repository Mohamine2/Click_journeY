<?php
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

header("Content-Type: text/plain");

$xmlData = file_get_contents("php://input");
$xml = simplexml_load_string($xmlData);

$prixBase = (float) $xml->prixBase;
$jours = (int) $xml->jours;
$nb_personnes = (int) $xml->nb_personnes;
$hebergement = (string) $xml->hebergement;

$total = $prixBase;
$total += $tarifs_hebergement[$hebergement] * $jours;

foreach ($xml->joursDetails->jour as $jour) {
    $transport = (string) $jour->transport;
    $resto = (string) $jour->restauration;
    $activite = (string) $jour->activite;

    $total += $tarifs_transport[$transport];
    $total += $tarifs_restauration[$resto];
    $total += $tarifs_activites[$activite];
}

$total *= $nb_personnes;

// Retourne le prix final
echo "Prix : " . $total . " €";
?>