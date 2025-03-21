<?php

session_start(); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Presentation - Dunes Seekers</title>
</head>

<body>

    <header>
        <a href="accueil.php"> Dunes Seekers </a>
    </header>

    <nav>
        <ul>
            <li><a href="accueil.php"> Accueil </a></li>
            <li><a href="recherche.php"> Recherche </a></li>
            <?php if(!isset($_SESSION["utilisateur"])): ?>
            <li><a href="connexion.php"> Connectez-vous</a></li>
            <?php endif; ?>
            <li><a href="profil.php"> Mon profil</a></li>
            <li><a href="presentation.php"> A propos de nous </a></li>
            <?php if (isset($_SESSION["utilisateur"]) && $_SESSION["utilisateur"]["role"] === "admin"): ?>
            <li><a href="admin.php">Espace Admin</a></li>
        <?php endif; ?>
        </ul>
        <input type="search" placeholder="Rechercher...">
    </nav>

    <section class="apropos">
        <h1> A propos de nous !</h1>

        <p> Nous sommes Dunes seekers: l'agence de voyages faite pour vous ! </p>
        <p>
            Notre équipe s'engage à vous offrir une expérience inoubliable dans les déserts du monde. Sénégal, Maroc
            ou encore Oman, nos excursions vont satisfaire votre désir d'aventure.
        </p>
        <p>
            Chez Dunes Seekers, nous sommes passionnés par l'aventure et la découverte. Notre agence de voyage est née
            de l'envie de partager avec vous les merveilles cachées de destinations uniques telles que le Maroc, l'Oman
            et le Sénégal.
        </p>
        <p>
            Notre Mission :

            Notre mission est de vous offrir des expériences de voyage inoubliables, riches en culture et en aventure.
            Nous croyons que chaque voyage est une opportunité de découvrir de nouveaux horizons, de rencontrer des
            personnes fascinantes et de créer des souvenirs impérissables.
        </p>
        <p>
            Nos Destinations :

            <ul>
            <li>Maroc : Plongez dans l'effervescence de la ville rouge, avec ses souks animés, ses jardins luxuriants et
            son patrimoine historique riche. Marrakech est une destination qui émerveille par sa diversité et son charme
            intemporel.</li>

            <li>Oman : Découvrez les paysages époustouflants d'Oman, entre déserts majestueux, montagnes impressionnantes et
            plages paradisiaques. Oman est une terre de contrastes où la nature et la culture se rencontrent
            harmonieusement.</li>

            <li>Sénégal : Explorez la vibrante capitale du Sénégal, avec ses marchés colorés, ses plages ensoleillées et son
            ambiance chaleureuse. Dakar est une ville dynamique qui vous accueille à bras ouverts pour une expérience
            authentique et enrichissante.</li>
            </ul>
        </p>
        <p>
            Pourquoi Choisir Dunes Seekers ?

            Chez Dunes Seekers, nous mettons tout en œuvre pour que votre voyage soit une expérience unique et
            personnalisée. Notre équipe dévouée est là pour vous accompagner à chaque étape, de la planification à la
            réalisation de votre voyage de rêve. Nous sélectionnons avec soin nos partenaires locaux pour vous garantir
            des services de qualité et des moments inoubliables.

            Rejoignez-nous pour une Aventure Inoubliable !

            Que vous soyez un aventurier aguerri ou un voyageur en quête de nouvelles découvertes, Dunes Seekers est
            votre partenaire idéal pour des voyages sur mesure. Laissez-nous vous guider vers des horizons lointains et
            des expériences uniques.

            Nous avons hâte de vous accueillir et de partager avec vous notre passion pour le voyage !</p>
    </section>

</body>

</html>