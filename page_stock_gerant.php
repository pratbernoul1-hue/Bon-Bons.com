<?php
session_start(); // savoir qui est connecter ?

include_once("header3.php");
include_once("db.php");

$boutique_id = $_GET["boutique_id"];

$produits = dbquery("
    SELECT 
        stocks.id AS stock_id,
        stocks.quantite,
        confiseries.nom,
        confiseries.type,
        confiseries.couleur,
        confiseries.illustration
    FROM stocks
    JOIN confiseries ON stocks.confiserie_id = confiseries.id
    WHERE stocks.boutique_id = ?
    ORDER BY confiseries.id
", [$boutique_id]); // recupere les données que de la boutique id 

$categories = [
    "Fruits du Verger",
    "Fruits Exotiques & Rares",
    "Agrumes de Provence",
    "Traditions Gourmandes",
    "Nature & Bien-être"
]; // recupere les categories 
?>

<link rel="stylesheet" href="style/page_stock_gerant.css">

<main class="page-stock">

    <img src="img/vrai_image/banniere.png" class="banniere-stock">

    <div class="haut-stock">
        <a href="page_ajouter_produit.php?boutique_id=<?= $boutique_id ?>" class="btn-ajouter">
            Ajouter un produit
        </a>
    </div>

    <section class="grille-stock">

        <?php foreach($categories as $categorie){ ?> <!-- colonne pour toutes les catégories -->

            <div class="colonne-stock">

                <h2><?= $categorie ?></h2>

                <?php foreach($produits as $produit){ ?> <!-- chaque tour recupere les données des produits --> 

                    <?php if($produit["type"] == $categorie){ ?> <!-- attention si le produit fait bien parti de la catégories-->

                        <div class="carte-stock <?= $produit["couleur"] ?>">

                            <img src="<?= $produit["illustration"] ?>" alt="<?= $produit["nom"] ?>">

                            <h3><?= $produit["nom"] ?></h3>

                            
                                <div class="stock"> <!-- diminuer ou augmenter le stock --> 

                                    <a href="page_modifier_stock.php?id=<?= $produit["stock_id"] ?>&action=moins&boutique_id=<?= $boutique_id ?>">-</a> <!-- modifier la ligen 8 par exemple en mettant moins et on revient sur la page -->

                                    <span><?= $produit["quantite"] ?></span>

                                    <a href=page_modifier_stock.php?id=<?= $produit["stock_id"] ?>&action=plus&boutique_id=<?= $boutique_id ?>">+</a>

                                    <a href="page_supprimer_produit.php?id=<?= $produit["stock_id"] ?>&boutique_id=<?= $boutique_id ?>" onclick="return confirm('Supprimer ce produit ?')">🗑️</a> <!-- suprimmer un produit avec un message de sureter -->

                                </div>


                        </div>

                    <?php } ?>

                <?php } ?>

            </div>

        <?php } ?>

    </section>

</main>

<?php
include_once("footer.php");
?>