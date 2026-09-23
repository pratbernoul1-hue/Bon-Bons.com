<?php

session_start();

include_once("db.php");

$message = "";

// Vérifie si le formulaire a été envoyé
if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];

    // Recherche l'utilisateur dans la base de données
    $utilisateur = dbquery(
        "SELECT * FROM utilisateurs
        WHERE email = ?
        AND nom = ?
        AND prenom = ?
        AND role = ?",
        [$email, $nom, $prenom, $role]
    );

    // Si l'utilisateur existe
    if (count($utilisateur) > 0) {

        $_SESSION["id"] = $utilisateur[0]["id"];
        $_SESSION["role"] = $utilisateur[0]["role"];

        // Si c'est un client
        if ($role == "client") {

            header("Location: page_accueil_boutique.php");
            exit();

        }

        // Si c'est un gérant ou un admin
        if ($role == "gerant" || $role == "admin") {

            header("Location: page_choix_boutique_gerant.php");
            exit();

        }

    } else {

        $message = "Utilisateur introuvable";

    }
}

// Le header est chargé après les redirections
include_once("header2.php");

?>

<link rel="stylesheet" href="style/page_connexion.css">

<main class="page-connexion">

    <img
        src="img/vrai_image/gauche.png"
        alt="gauche"
        class="image-gauche"
    >

    <img
        src="img/vrai_image/droite.png"
        alt="droite"
        class="image-droite"
    >

    <section class="bloc-connexion">

        <form class="form-connexion" method="POST">

            <div class="choix-role">

                <label>
                    <input
                        type="radio"
                        name="role"
                        value="admin"
                        required
                    >
                    Admin
                </label>

                <label>
                    <input
                        type="radio"
                        name="role"
                        value="gerant"
                    >
                    Gérant
                </label>

                <label>
                    <input
                        type="radio"
                        name="role"
                        value="client"
                    >
                    Client
                </label>

            </div>

            <label>Nom</label>

            <input
                type="text"
                name="nom"
                required
            >

            <label>Prénom</label>

            <input
                type="text"
                name="prenom"
                required
            >

            <label>Email</label>

            <input
                type="email"
                name="email"
                required
            >

            <?php if ($message != "") { ?>

                <p><?= htmlspecialchars($message) ?></p>

            <?php } ?>

            <div class="bouton-valider">

                <button type="submit">
                    Valider
                </button>

            </div>

        </form>

    </section>

</main>

<?php

include_once("footer.php");

?>