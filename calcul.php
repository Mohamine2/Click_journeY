<?php
// Récupère et décode le JSON
$input = file_get_contents("php://input");
$data = json_decode($input, true);

$tarifs = [
    "hebergement" => [
        "Hotel" => 100,
        "Maison d'hotes" => 0,
        "Appartement" => 70
    ],
    "transport" => [
        "Autonome" => 0,
        "navette" => 15,
        "Taxi individuel" => 30
    ],
    "restauration" => [
        "Aucune" => 0,
        "Demi-pension" => 20,
        "Pension complète" => 40
    ],
    "activites" => [
        "Oui" => 50,
        "Non" => 0
    ]
];

$prix = floatval($data['prixBase']);
$jours = intval($data['jours']);
$nb_personnes = intval($data['nb_personnes']);
$prix += $tarifs["hebergement"][$data["hebergement"]] * $jours;

foreach ($data['joursDetails'] as $jour) {
    $prix += $tarifs["transport"][$jour["transport"]];
    $prix += $tarifs["restauration"][$jour["restauration"]];
    $prix += $tarifs["activites"][$jour["activite"]];
}

$prix *= $nb_personnes;

echo $prix;
?>