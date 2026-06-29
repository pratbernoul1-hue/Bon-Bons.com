<?php
include_once("header.php");
include_once("db.php");

$boutique_id = 1;

if(isset($_GET["boutique_id"])){
    $boutique_id = $_GET["boutique_id"];
}

$cat = 1;

if(isset($_GET["cat"])){
    $cat = $_GET["cat"];
}

/* on transforme le numéro en vraie catégorie */
$categorie = "Fruits du Verger";

if($cat == 1){
    $categorie = "Fruits du Verger";
}
else if($cat == 2){
    $categorie = "Fruits Exotiques & Rares";
}
else if($cat == 3){
    $categorie = "Agrumes de Provence";
}
else if($cat == 4){
    $categorie = "Traditions Gourmandes";
}
else if($cat == 5){
    $categorie = "Nature & Bien-être";
}

/* On récupère les produits de la bonne boutique et de la bonne catégorie */
$produits = dbquery("
    SELECT
        stocks.quantite,
        confiseries.nom,
        confiseries.type,
        confiseries.couleur,
        confiseries.prix,
        confiseries.illustration,
        confiseries.description
    FROM stocks
    JOIN confiseries ON stocks.confiserie_id = confiseries.id
    WHERE stocks.boutique_id = ?
    AND confiseries.type = ?
    ORDER BY confiseries.id
", [$boutique_id, $categorie]);
?>

<link rel="stylesheet" href="style/categorie.css">

<main class="page-categorie">

    <img src="img/vrai_image/banniere.png" alt="Bannière Les Bon-bons" class="banniere-catalogue">

    <div class="tri">
        <button id="btn-tri">Trier par ▼</button>

        <div id="menu-tri" class="menu-tri">
            <a href="page_categorie1.php?cat=1&boutique_id=<?= $boutique_id ?>">Fruits du Verger</a>
            <a href="page_categorie1.php?cat=2&boutique_id=<?= $boutique_id ?>">Fruits Exotiques & Rares</a>
            <a href="page_categorie1.php?cat=3&boutique_id=<?= $boutique_id ?>">Agrumes de Provence</a>
            <a href="page_categorie1.php?cat=4&boutique_id=<?= $boutique_id ?>">Traditions Gourmandes</a>
            <a href="page_categorie1.php?cat=5&boutique_id=<?= $boutique_id ?>">Nature & Bien-être</a>
        </div>
    </div>

    <h1><?= $categorie ?></h1>

    <section class="produits-categorie">

        <?php foreach($produits as $produit){ ?>

            <div class="carte-produit <?= $produit["couleur"] ?>">

                <a href="#" class="lien-produit">
                    <img src="<?= $produit["illustration"] ?>" alt="<?= $produit["nom"] ?>">
                    <h3><?= $produit["nom"] ?></h3>
                </a>

                <p><?= $produit["prix"] ?>€</p>

                <p><?= $produit["description"] ?></p>

                <button class="ajout-panier"
                    data-nom="<?= $produit["nom"] ?>"
                    data-prix="<?= $produit["prix"] ?>€"
                    data-image="<?= $produit["illustration"] ?>"
                    data-couleur="<?= $produit["couleur"] ?>">
                    Ajouter au panier
                </button>

                <p>★ ★ ★ ☆</p>

            </div>

        <?php } ?>

    </section>

    <aside id="barre-panier" class="barre-panier">

    <a href="page_panier.php" class="titre-panier">
        Votre panier...
        <span>🛒</span>
    </a>

    <div id="contenu-panier"></div>

</aside>

</main>

<script src="js/catalogue.js"></script>

<?php
include_once("footer.php");
?>