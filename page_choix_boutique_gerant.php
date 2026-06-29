<?php
session_start(); // permet utiliser les infos de connection de l'utilisateurs 

include_once("header3.php");
include_once("db.php");

if($_SESSION["role"] == "admin"){ // regarde si on est connecter en mode admin 
    $boutiques = dbquery("SELECT * FROM boutiques"); // alors il accède a toute les tables boutiques 
}
else{ // sinon il est gerant donc 
    $id = $_SESSION["id"]; // on recupere seulement les boutique qui lui appartienne 

    $boutiques = dbquery(
        "SELECT * FROM boutiques WHERE utilisateur_id = ?",
        [$id]
    ); // le gerant voit que c'est deux boutiques 
}
?>

<link rel="stylesheet" href="style/page_choix_boutique_gerant.css">

<main class="page-choix-gerant">

    <img src="img/vrai_image/banniere.png" alt="Bannière Les Bon-bons" class="banniere-gerant">

    <section class="boutiques-gerant">

        <h2>Choisissez une boutique à gérer</h2>

        <div class="grille-boutiques-gerant"> <!-- afficher les cartes -->

            <?php foreach($boutiques as $boutique){ ?> <!-- on parcours les boutique de la bdd et affiche une carte pour ces boutiques -->

                <?php
                    $couleurs = ["bleu", "rose", "jaune", "orange", "violet", "bleu"];
                    $couleur = $couleurs[$boutique["id"] - 1];
                ?><!--on choisi la couleur en fonction de l'id de la boutique dans un tableau -->

                <a href="page_stock_gerant.php?boutique_id=<?= $boutique['id'] ?>" class="lien-boutique"> <!-- lien pour la page en fonction de l'id de la boutique  -->

                    <div class="carte-boutique-gerant <?= $couleur ?>">

                        <img src="img/boutique/boutique<?= $boutique['id'] ?>.png">

                        <h3><?= $boutique["nom"] ?></h3>

                        <p><?= $boutique["ville"] ?></p> <!-- recupere les données et les affiche -->

                        <div class="btn-gerer">Gérer cette boutique</div>

                    </div>

                </a>

            <?php } ?>

        </div>

    </section>

</main>

<?php
include_once("footer.php");
?>