<?php

// Affiche les erreurs pour trouver le problème
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de données
include_once("db.php");

// Boutique 1 par défaut
$boutique_id = 1;

// Récupère la boutique choisie
if (isset($_GET["boutique_id"])) {
    $boutique_id = (int) $_GET["boutique_id"];
}

// Liste des catégories
$categories = [
    "Fruits du Verger",
    "Fruits Exotiques & Rares",
    "Agrumes de Provence",
    "Traditions Gourmandes",
    "Nature & Bien-être"
];

// Récupération des produits
try {

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
        JOIN confiseries
            ON stocks.confiserie_id = confiseries.id
        WHERE stocks.boutique_id = ?
        ORDER BY confiseries.id
    ", [$boutique_id]);

} catch (Exception $e) {

    die(
        "<h2>Erreur dans le catalogue</h2>
        <p>" . htmlspecialchars($e->getMessage()) . "</p>"
    );

}

// On affiche le header seulement après la requête
include_once("header.php");

?>

<link rel="stylesheet" href="style/catalogue.css">

<main class="catalogue">

    <img
        src="img/vrai_image/banniere.png"
        alt="Bannière Les Bon-bons"
        class="banniere-catalogue"
    >

    <div class="tri">

        <button id="btn-tri">
            Trier par ▼
        </button>

        <div id="menu-tri" class="menu-tri">

            <a href="page_categorie1.php?cat=Fruits%20du%20Verger">
                Fruits du Verger
            </a>

            <a href="page_categorie2.php?cat=Fruits%20Exotiques%20%26%20Rares">
                Fruits Exotiques & Rares
            </a>

            <a href="page_categorie3.php?cat=Agrumes%20de%20Provence">
                Agrumes de Provence
            </a>

            <a href="page_categorie4.php?cat=Traditions%20Gourmandes">
                Traditions Gourmandes
            </a>

            <a href="page_categorie5.php?cat=Nature%20%26%20Bien-%C3%AAtre">
                Nature & Bien-être
            </a>

        </div>

    </div>


    <section class="grille-catalogue">

        <?php foreach ($categories as $categorie) { ?>

            <div class="colonne-categorie">

                <h2>
                    <?= htmlspecialchars($categorie) ?>
                </h2>


                <?php foreach ($produits as $produit) { ?>


                    <?php if ($produit["type"] == $categorie) { ?>

                        <div class="carte-produit <?= htmlspecialchars($produit["couleur"]) ?>">

                            <a
                                href="Page_produit_nougats.php"
                                class="lien-produit"
                            >

                                <img
                                    src="<?= htmlspecialchars($produit["illustration"]) ?>"
                                    alt="<?= htmlspecialchars($produit["nom"]) ?>"
                                >

                                <h3>
                                    <?= htmlspecialchars($produit["nom"]) ?>
                                </h3>

                            </a>


                            <p>
                                <?= htmlspecialchars($produit["prix"]) ?>€
                            </p>


                            <p>
                                <?= htmlspecialchars($produit["description"]) ?>
                            </p>


                            <button
                                class="ajout-panier"
                                data-nom="<?= htmlspecialchars($produit["nom"]) ?>"
                                data-prix="<?= htmlspecialchars($produit["prix"]) ?>€"
                                data-image="<?= htmlspecialchars($produit["illustration"]) ?>"
                                data-couleur="<?= htmlspecialchars($produit["couleur"]) ?>"
                            >
                                Ajouter au panier
                            </button>


                            <p>
                                ★ ★ ★ ☆
                            </p>

                        </div>

                    <?php } ?>


                <?php } ?>

            </div>

        <?php } ?>

    </section>


    <section class="banniere-defilement">

        <h2>
            Craquez aussi pour
        </h2>

        <button class="fleche gauche-fleche">
            ‹
        </button>


        <div class="produits-defilement">

            <img
                src="img/vrai_image/image 1.png"
                alt="Produit"
            >

            <img
                src="img/vrai_image/image 2.png"
                alt="Produit"
            >

            <img
                src="img/vrai_image/image 3.png"
                alt="Produit"
            >

            <img
                src="img/vrai_image/image 4.png"
                alt="Produit"
            >

            <img
                src="img/vrai_image/image 5.png"
                alt="Produit"
            >

        </div>


        <button class="fleche droite-fleche">
            ›
        </button>

    </section>


    <aside
        id="barre-panier"
        class="barre-panier"
    >

        <a
            href="page_panier.php"
            class="titre-panier"
        >

            Votre panier...

            <span>
                🛒
            </span>

        </a>


        <div id="contenu-panier"></div>

    </aside>

</main>


<script src="js/catalogue.js"></script>


<?php

include_once("footer.php");

?>