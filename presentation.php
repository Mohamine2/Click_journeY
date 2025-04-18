<?php

    session_start(); 

    // Vérifier si une recherche a été soumise
    $searchQuery = isset($_GET['q']) ? $_GET['q'] : '';
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
        <form method="get" action="resultats.php">
            <input type="search" name="q" placeholder="Rechercher..." value="<?= htmlspecialchars($searchQuery) ?>" />
        </form>
    </nav>

    <section class="apropos">
        <h1> A propos de nous !</h1>

        <p> Nous sommes Dunes seekers: l'agence de voyages faite pour vous ! </p>
        <p>
            Notre équipe s'engage à vous offrir une expérience inoubliable dans les déserts du monde.
            Comme le désert du Sahara, d'Arabie ou de Gobi avec des excursions qui vont satisfaire votre désir d'aventure.
        </p>
        <p>
            Chez Dunes Seekers, nous sommes passionnés par l'aventure et la découverte. Notre agence de voyage est née
            de l'envie de partager avec vous les merveilles cachées du désert aves des destinations uniques comme le Sahara et l'Arabie.
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
            <li>Désert du Sahara : Découvrez l'effervescence des pays tels que l'Algérie,le Maroc,la Libye, la Tunisie ou le Mali avec leurs souks animés, ses paysages luxuriants et
            leurs patrimoine historique riche. Ces destinations sont là pour émerveiller par leurs diversités et ses charme
            intemporel.</li>
            </br>

            <li>Désert d'Arabie : Plongez-vous dans les paysages époustouflants d'Arabie et ses pays comme l'Arabie Saoudite,la Jordanie,les Emirats Arabes Unis ou le Oman.Où vous allez pouvoir 
                observer et être dans des déserts majestueux,des montagnes impressionnantes et des plages paradisiaques. L'Arabie est une terre de contrastes où la nature et la technologie se rencontrent
            harmonieusement.</li>
            </br>

            <li>Désert de Gobi : Explorez l'univers fascinant de la Chine ou de la Mongalie, avec son désert à la fois aride et plein de vie.Et ses formations rocheuses étrange à travers une
            ambiance chaleureuse. Ce paysage unique vous accueille à bras ouverts pour une expérience
            authentique et enrichissante.</li>
            </br>

            <li>Désert de Kalahari : Partez à la découverte d'un paysage sauvage et préservé à travers la Namibie ou encore l'Afrique du Sud, où les dunes sculptées par le vent côtoient des formations rocheuses spectaculaires.
                 Un monde de sérénité et immersif pour les amoureux de nature.</li>
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

<footer>
        <p>&copy; 2025 Dunes Seekers. Tous droits réservés.</p>
        <button id="bouton-mode">Mode sombre</button>
    </footer>

    <script src="mode_sombre.js"></script>

</html>