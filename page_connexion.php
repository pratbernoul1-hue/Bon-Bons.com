<?php
session_start();

include_once("header2.php");
include_once("db.php");

$message = ""; // si la connexion echoue ca affichera un message mais la c'est vide 

if(isset($_POST["email"])){ // verifie si le formulaire est envoyer 

    $email = $_POST["email"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];// envoyer avec la methodes post
    $role = $_POST["role"];

    $utilisateur = dbquery(
        "SELECT * FROM utilisateurs 
        WHERE email = ? AND nom = ? AND prenom = ? AND role = ?",
        [$email, $nom, $prenom, $role]
    ); // cherche une personnne qui correspond dans la table , on recupere les données il existe ?

    if(count($utilisateur) > 0){ //dbquery renvoie une tableau donc si utilisateur est trouver alors il ya au moins une ligne sinon non 

        $_SESSION["id"] = $utilisateur[0]["id"];
        $_SESSION["role"] = $utilisateur[0]["role"]; // on enregristre son id et son role et en ficntion de son role 

        if($role == "client"){
            header("Location: page_accueil_boutique.php"); // si c'est un client il est renvoyer la 
        }

        if($role == "gerant" || $role == "admin"){ // gerant ou admin il est renvoyer la 
            header("Location: page_choix_boutique_gerant.php");
        }
    }
    else{// sinon message d'erreur renvoyer 
        $message = "Utilisateur introuvable"; 
    }
}
?>

<link rel="stylesheet" href="style/page_connexion.css">

<main class="page-connexion">

    <img src="img/vrai_image/gauche.png" alt="gauche" class="image-gauche">
    <img src="img/vrai_image/droite.png" alt="droite" class="image-droite">

    <section class="bloc-connexion">

        <form class="form-connexion" method="POST"> <!--- envoyer avec post -->

            <div class="choix-role">

                <label>
                    <input type="radio" name="role" value="admin" required>
                    Admin
                </label>

                <label>
                    <input type="radio" name="role" value="gerant">
                    Gérant
                </label>

                <label>
                    <input type="radio" name="role" value="client">
                    Client
                </label>

            </div>

            <label>Nom</label>
            <input type="text" name="nom" required>

            <label>Prénom</label>
            <input type="text" name="prenom" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <p><?= $message ?></p> <!-- si tous va bien vide sinon introuvable --> 

            <div class="bouton-valider">
                <button type="submit">Valider</button>
            </div>

        </form>

    </section>

</main>

<?php
include_once("footer.php");
?>