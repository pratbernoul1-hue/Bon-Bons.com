<?php
include_once("header1.php");
?>

<link rel="stylesheet" href="style/page_accueil_boutique.css">
<main class="accueil">

    <img src="img/vrai_image/gauche.png" alt="gauche" class="image-gauche" >

    <img src="img/vrai_image/droite.png" alt="droite" class="image-droite" >

    <section class="bloc-bienvenue"> <!-- crée des sections diff -->

        <h1>BIENVENUE</h1>

        <p>Entrer dans le monde de</p>

        <img src="img/vrai_image/logo.png" alt="Les Bon-bons" class="logo-centre">

    </section>

    <section class="presentation-marque">

    <div class="bloc-images">

        <div class="ligne-images">
            <img src="img/vrai_image/banniere.png" alt="1">
            <img src="img/vrai_image/pub3.png" alt="2">
        </div>

        <div class="ligne-images">
            <img src="img/vrai_image/pub2.jpg" alt="3">
            <img src="img/vrai_image/pub4.jpg" alt="4">
        </div>

    </div>

    <h2>Présentation de la marque</h2>

    <p>
        Les Bon-Bons est une marque française créée en 2010 par Arthur Convenant.
        Spécialisée dans les confiseries bio à faible teneur en sucre, elle fabrique près de
        Salon-de-Provence des bonbons aux saveurs originales à partir d’ingrédients locaux
        et parfois rares.

        Commercialisée exclusivement en ligne auprès de grossistes, la marque se distingue
        par son engagement pour une consommation plus responsable et par son
        positionnement premium.

        Son identité visuelle repose sur deux nuances de vert évoquant le naturel et
        l’authenticité.
    </p>

</section>

<section class="boutiques"> 

    <h2>Choisissez votre boutique</h2>

    <div class="grille-boutiques">
        <a href="page_catalogue1.php?boutique_id=1" class="lien-boutique">    <!-- chaque carte boutique envoie a vers le catalogue. boutique_id sert a choisir quelle boutique -->     
        <div class="carte-boutique bleu"> <!-- juste changer la couleur dans le css -->
            <img src="img/boutique/boutique1.png" alt="boutique1">
            <h3>Boutique Bon-bons</h3>
            <p>Paris</p>
        </div>

        <a href="page_catalogue1.php?boutique_id=2" class="lien-boutique">
            <div class="carte-boutique rose">
            <img src="img/boutique/boutique2.png" alt="boutique2">
            <h3>Boutique Bon-bons</h3>
            <p>Rennes</p>
        </div>

        <a href="page_catalogue1.php?boutique_id=3" class="lien-boutique">
            <div class="carte-boutique jaune">
            <img src="img/boutique/boutique3.png" alt="boutique3">
            <h3>Boutique Bon-bons</h3>
            <p>Lille</p>
        </div>

        <a href="page_catalogue1.php?boutique_id=4" class="lien-boutique">
            <div class="carte-boutique orange">
            <img src="img/boutique/boutique4.png" alt="boutique4">
            <h3>Boutique Bon-bons</h3>
            <p>Toulouse</p>
        </div>

        <a href="page_catalogue1.php?boutique_id=5" class="lien-boutique">
            <div class="carte-boutique violet">
            <img src="img/boutique/boutique5.png" alt="boutique5">
            <h3>Boutique Bon-bons</h3>
            <p>Bordeaux</p>
        </div>

        <a href="page_catalogue1.php?boutique_id=6" class="lien-boutique">
            <div class="carte-boutique bleu">
            <img  src="img/boutique/boutique6.png" alt="boutique6">
            <h3>Boutique Bon-bons</h3>
            <p>Lyon</p>
        </div>

    </div>

</section>

</main>

<?php
include_once("footer.php");
?>