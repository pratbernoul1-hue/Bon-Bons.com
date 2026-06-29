<?php
include_once("header3.php");
include_once("db.php");

//affiche le formulaire 
// envoie le formulaire et donc l'ajoute a la base de données 

$boutique_id = $_GET["boutique_id"]; // ici je récupère l'id de la boutique ==> recupere des données de l'url 

if(isset($_POST["nom"])){ // verifier si le formulaire a été envoyer pour faire marcher le code et si ca existe ex : nom 

    dbquery( // les données sont envoyer par la méthodes post 
        "INSERT INTO confiseries(nom, type, couleur, prix, illustration, description)
        VALUES (?, ?, ?, ?, ?, ?)", // ? replacer après par les valeurs du formulaires qui ont été remplie renvoie une erreur si il ya en a une qui est pas remplie 
        [
            $_POST["nom"],
            $_POST["type"],
            $_POST["couleur"],
            $_POST["prix"],
            $_POST["illustration"],
            $_POST["description"]
        ]
    );

    $resultat = dbquery("SELECT LAST_INSERT_ID() AS id");  // on recupère les resulats qui ont été approuver et on lui attribue un nouvel id apres le dernier attribuer 
    $confiserie_id = $resultat[0]["id"]; // on le stock dans la varibale 

    dbquery( // on ajoute une ligne mais cette fois ci a la table stockkkk
        "INSERT INTO stocks(quantite, date_de_modification, boutique_id, confiserie_id)
        VALUES (?, NOW(), ?, ?)",
        [
            $_POST["quantite"], // on ajoute une quantité qui est rentrée mtn et on reconnais le bonbons grace a son id et id de la boutique 
            $boutique_id,
            $confiserie_id
        ]
    );

    header("Location: page_stock_gerant.php?boutique_id=" . $boutique_id); // redirection vers la page boutique la bonne 
   
}
?>


<link rel="stylesheet" href="style/page_ajouter_produit.css">

<main class="page-ajout">

    <form class="bloc-ajout" method="POST" action="page_ajouter_produit.php?boutique_id=<?= $boutique_id ?>"> <!-- envoie le formulaire avec la méthode post et ca envoie les données a la page ajouter -->

        <div class="partie-image">
            <label>Image du produit</label>
            <input type="text" name="illustration" placeholder="img/vrai_image/figue.png" required>
        </div>

        <div class="partie-formulaire">

            <label>Nom du bonbon</label>
            <input type="text" name="nom" required> <!-- $Post [nom]-->

            <label>Description</label>
            <input type="text" name="description" required>

            <label>Prix</label>
            <input type="number" step="0.01" name="prix" required> <!-- ecrire avec des centimes -->

            <label>Stock</label>
            <input type="number" name="quantite" required>

            <label>Catégorie</label>
            <select name="type">
                <option>Fruits du Verger</option>
                <option>Fruits Exotiques & Rares</option>
                <option>Agrumes de Provence</option>
                <option>Traditions Gourmandes</option>
                <option>Nature & Bien-être</option>
            </select>

            <label>Couleur</label>
            <select name="couleur">
                <option value="bleu">Bleu</option>
                <option value="rose">Rose</option>
                <option value="jaune">Jaune</option>
                <option value="orange">Orange</option>
                <option value="violet">Violet</option>
            </select>

            <div class="bouton-valider">
                <button type="submit">Valider</button>
            </div>

        </div>

    </form>

</main>

<?php
include_once("footer.php");
?>