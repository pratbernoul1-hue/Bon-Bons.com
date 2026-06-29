<?php
include_once("header.php");
include_once("db.php");

$boutique_id = 1; // on selectionne la boutique id 1 si aucune le client ne c'est pas connecter 

if(isset($_GET["boutique_id"])){
    $boutique_id = $_GET["boutique_id"]; // regarde qu'elle boutique a été choisi 
}

// elle recupere les données des bonbons dispo dans la boutique 
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
    ORDER BY confiseries.id
", [$boutique_id]); // ? remplacer que par les données de la boutique choisi // pour avoir toutes les données un join 

$categories = [ 
    "Fruits du Verger",
    "Fruits Exotiques & Rares",
    "Agrumes de Provence",
    "Traditions Gourmandes",
    "Nature & Bien-être"
];// les catégories a afficher et il crée des colonnes 
?>

<link rel="stylesheet" href="style/catalogue.css">

<main class="catalogue">

    <img src="img/vrai_image/banniere.png" alt="Bannière Les Bon-bons" class="banniere-catalogue">

    <div class="tri">
        <button id="btn-tri">Trier par ▼</button> <!--important pour le js -->

        <div id="menu-tri" class="menu-tri">
            <a href="page_categorie1.php?cat=Fruits du Verger">Fruits du Verger</a>
            <a href="page_categorie2.php?cat=Fruits Exotiques & Rares">Fruits Exotiques & Rares</a>
            <a href="page_categorie3.php?cat=Agrumes de Provence">Agrumes de Provence</a>
            <a href="page_categorie4.php?cat=Traditions Gourmandes">Traditions Gourmandes</a>
            <a href="page_categorie5.php?cat=Nature & Bien-être">Nature & Bien-être</a>
        </div>
    </div>

    <section class="grille-catalogue"> <!--afichage des catégories et des cartes produits -->

        <?php foreach($categories as $categorie){ ?> <!--parcours toute les catégories et a chaque tour elle prend une données differentes et elle crée un =e collone a pour chaque catégories -->

            <div class="colonne-categorie">

                <h2><?= $categorie ?></h2> <!--pour chaque categories on crée une collone avec son titre -->

                <?php foreach($produits as $produit){ ?> <!--on parcours tous les produits de la base des données -->

                    <?php if($produit["type"] == $categorie){ ?> <!--verifier si le produit appartient a la bonne ctegories -->

                        <div class="carte-produit <?= $produit["couleur"] ?>"> <!--on crée la cards avec la couleurs qui change en fonction -->

                            <a href="Page_produit_nougats.php" class="lien-produit">
                                <img src="<?= $produit["illustration"] ?>" alt="<?= $produit["nom"] ?>"> <!-- toutes les données sont recupere le la base de données et retranscrite -->
                                <h3><?= $produit["nom"] ?></h3>
                            </a>

                            <p><?= $produit["prix"] ?>€</p>

                            <p><?= $produit["description"] ?></p>

                                <!-- les atribut data servent a les transmettre les infos au js, quand on appuie sur ajouter au panier on a recupere les données... -->
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

                <?php } ?>

            </div>

        <?php } ?>

    </section>

    <section class="banniere-defilement">
        <h2>Craquez aussi pour</h2>

        <button class="fleche gauche-fleche">‹</button>

        <div class="produits-defilement">
            <img src="img/vrai_image/image 1.png">
            <img src="img/vrai_image/image 2.png">
            <img src="img/vrai_image/image 3.png">
            <img src="img/vrai_image/image 4.png">
            <img src="img/vrai_image/image 5.png">
        </div>

        <button class="fleche droite-fleche">›</button>
    </section>

    <aside id="barre-panier" class="barre-panier"> <!--afficher un eelement secondaire  bar latérale afficher grace au js -->
        <a href="page_panier.php" class="titre-panier">
            Votre panier...
            <span>🛒</span>
        </a>

        <div id="contenu-panier"></div> <!-- vide au depart remplie avec le js -->
    </aside>

</main>

<script src="js/catalogue.js"></script>

<?php
include_once("footer.php");
?>