<?php
include_once("header.php");
?>

<link rel="stylesheet" href="style/page_produit.css">

<main class="page-produit">

    <section class="bloc-produit orange">

        <div class="image-produit">
            <img src="img/vrai_image/nougats.png" alt="Nougats">
        </div>

        <div class="infos-produit">

            <h1>Nougats</h1>

            <p>
                Un nougat bio artisanal aux amandes et figues de Provence.
                Une recette gourmande avec 30 % de sucres ajoutés en moins.
            </p>

            <p>Poids : 150 g</p>

            <div class="ligne-achat">
                <button id="moins">-</button>
                <span id="quantite">1</span>
                <button id="plus">+</button>

                <p class="prix">14.99€</p>

                <button id="valider">Valider</button> <!-- sert a valider grace au fonctio js -->
            </div>

            <h2>AVIS</h2>

            <div class="avis">
                <div class="avis-box">
                    <p>Mary R.</p>
                    <p>★★★★★</p>
                    <p>Super bonbons</p>
                </div>

                <div class="avis-box">
                    <p>Alex P.</p>
                    <p>★★★☆☆</p>
                    <p>Avec le café ça passe bien !</p>
                </div>

                <div class="avis-box">
                    <p>Joël C.</p>
                    <p>★★★★★</p>
                    <p>J’ai adoré en manger tout la journée !</p>
                </div>

                <div class="avis-box">
                    <p>Marie L.</p>
                    <p>★★★★★</p>
                    <p>Super pour le goûter !</p>
                </div>
            </div>

        </div>

    </section>

</main>

<script src="js/page_produit.js"></script>

<?php
include_once("footer.php");
?>