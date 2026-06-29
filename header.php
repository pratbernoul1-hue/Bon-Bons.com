<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Les Bon-bons</title>

    <link rel="stylesheet" href="style/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


</head>

<body>

<header>

    <div class="header-container"> <!--sert dans le css pour aligné les élements -->

        <div class="logo"> <!--logo reglée avec le css apres pour la taille -->
            <img src="img/vrai_image/logo.png" alt="Logo">
        </div>

        <nav>
            <a href="page_catalogue1.php">Accueil</a>
            <a href="page_a_propos.php">A propos de nous</a>
            <a href="page_contact.php">Contact</a>
        </nav>

        <div class="header-right"> <!-- les élment a droit plus centrée utilisateurs -->

            <span class="bonjour">Bonjour</span> <!-- afficher un petit texte-->

            <a href="page_panier.php" class="cart">
                🛒 <span id="nombre-panier">0</span> <!-- id nombre sert pour le java script pour qu'il puisse changer-->
            </a>

            <a href="page_accueil_boutique.php" class="btn-deconnexion">
                Déconnexion
            </a>

        </div>

    </div>

</header>