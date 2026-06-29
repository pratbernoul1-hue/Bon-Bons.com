
let boutonTri = document.getElementById("btn-tri"); // recupere les eleemnt avce leur id 
let menuTri = document.getElementById("menu-tri");

if(boutonTri != null && menuTri != null){ // verifie si les boutons existe bien 

    boutonTri.addEventListener("click", function(){ // declencher le code 

        if(menuTri.style.display == "block"){ // si le menu est afficher alors on le cache sinon on le montre 
            menuTri.style.display = "none";
        }
        else{
            menuTri.style.display = "block";
        }

    });

}



let boutonsAjout = document.querySelectorAll(".ajout-panier"); // recupere les boutons ajouter au panier 
let barrePanier = document.getElementById("barre-panier"); // panier latérale 
let contenuPanier = document.getElementById("contenu-panier"); // zone vide dans laquelle le panier est afficher
let nombrePanier = document.getElementById("nombre-panier"); // nombre affiche du nombre d'article dans le header 
// recupere les elements 

let panier = []; // tableau vide qui ce rajoute au fur et a mesure 



if(localStorage.getItem("panier") != null){ // sauvgarder le panier dans le navigateur de l'utilisateur 
    panier = JSON.parse(localStorage.getItem("panier")); // transforme le texte sauvgarder en tableau js 
}



function sauvegarderPanier(){
    localStorage.setItem("panier", JSON.stringify(panier)); // elle sauvgarde le panier et le transforme en texte pour pouvoir l'enregistrer 
}



function compterArticles(){ // compter le nombre articles dans le panier 

    let total = 0;

    for(let i = 0; i < panier.length; i++){ // ajoute chaque quantité 
        total = total + panier[i].quantite; // affiche dans le header 
    }

    if(nombrePanier != null){
        nombrePanier.textContent = total;
    }

}


function afficherPanier(){

    if(contenuPanier == null){
        return;
    } // si elle existe pas elle s'arrete 

    contenuPanier.innerHTML = ""; // vide 

    for(let i = 0; i < panier.length; i++){ // parcours tous les produit du panier 

        let produit = document.createElement("div");
        produit.className = "produit-panier " + panier[i].couleur; // crée une div pour chaque element du panier carte + couleurs 

        let ligne = document.createElement("div");
        ligne.className = "ligne-produit"; // organiser l'image et les informations dans le panier 

        let image = document.createElement("img");
        image.src = panier[i].image; // image a partir du chemin enregistrer dans le  panier 

        let infos = document.createElement("div"); // dic pour les infos 

        let titre = document.createElement("h3");
        titre.textContent = panier[i].nom;// titre 

        let prix = document.createElement("p");
        prix.textContent = panier[i].prix; // paragraphe prix 

        infos.appendChild(titre);
        infos.appendChild(prix);// titre et prix sont mis dans infos 

        ligne.appendChild(image);
        ligne.appendChild(infos);// image te infos dans ligne 

        let quantite = document.createElement("div");
        quantite.className = "quantite"; // boutons moins plus 

        let boutonMoins = document.createElement("button");
        boutonMoins.textContent = "-";

        let nombreProduit = document.createElement("span");
        nombreProduit.className = "nombre-produit";
        nombreProduit.textContent = panier[i].quantite; // quantite afficher modifier apres par les autres 

        let boutonPlus = document.createElement("button");
        boutonPlus.textContent = "+";

        quantite.appendChild(boutonMoins);
        quantite.appendChild(nombreProduit);
        quantite.appendChild(boutonPlus);

        let boutonVoir = document.createElement("button");
        boutonVoir.className = "btn-panier";
        boutonVoir.textContent = "Voir le panier"; // voir la page panier complete 

        let boutonSupprimer = document.createElement("button");
        boutonSupprimer.className = "supprimer";
        boutonSupprimer.textContent = "🗑️";

        produit.appendChild(ligne);
        produit.appendChild(quantite); // tous les element sont ajouter dans la carte produit puis dans la barre panier 
        produit.appendChild(boutonVoir);
        produit.appendChild(boutonSupprimer);

        contenuPanier.appendChild(produit);


        boutonPlus.addEventListener("click", function(){ // la quantité augmente de 1 le panier est suavgarder et mis a jour 
            panier[i].quantite = panier[i].quantite + 1;

            sauvegarderPanier();
            afficherPanier();
            compterArticles(); // recalculer le nb d'articles 

            barrePanier.classList.add("ouvert"); // la barre reste ouverte 
        });


        boutonMoins.addEventListener("click", function(){

            if(panier[i].quantite > 1){
                panier[i].quantite = panier[i].quantite - 1;
            }

            sauvegarderPanier();
            afficherPanier();
            compterArticles();

            barrePanier.classList.add("ouvert");
        });


        boutonSupprimer.addEventListener("click", function(){ // suprimmer puis met a jour 

            panier.splice(i, 1);

            sauvegarderPanier();
            afficherPanier();
            compterArticles();

            barrePanier.classList.add("ouvert");
        });

    }

}



for(let i = 0; i < boutonsAjout.length; i++){ // tous les boutons ajoter au panier 

    boutonsAjout[i].addEventListener("click", function(){

        let nom = boutonsAjout[i].getAttribute("data-nom");
        let prix = boutonsAjout[i].getAttribute("data-prix");
        let image = boutonsAjout[i].getAttribute("data-image");
        let couleur = boutonsAjout[i].getAttribute("data-couleur"); // recupere les données dans les attributs data 

        let existe = false;

        for(let j = 0; j < panier.length; j++){

            if(panier[j].nom == nom){
                panier[j].quantite = panier[j].quantite + 1; // puis augmente la quantité 
                existe = true;
            } // verifie qu'il existe 

        }

        if(existe == false){ // si il existe pas on crée un nouveau 

            let nouveauProduit = {
                nom: nom,
                prix: prix,
                image: image,
                couleur: couleur,
                quantite: 1
            };

            panier.push(nouveauProduit); // puis on l'ajoute 
        }

        sauvegarderPanier(); // on met a jour la suavgarde 
        afficherPanier();
        compterArticles();

        if(barrePanier != null){
            barrePanier.classList.add("ouvert"); // apres lzjout d'un produit lz brre s'ouvre 
        }

    });

}



document.addEventListener("click", function(event){ // on ferme la barre quand on clic ailleurs 

    if(barrePanier != null){

        if(event.target.className != "ajout-panier"){ // on verifie que c'est pas ajouter au panier 
            
            if(barrePanier.contains(event.target) == false){
                barrePanier.classList.remove("ouvert");
            }

        }

    }

});



let images = [
    "img/vrai_image/image 1.png",
    "img/vrai_image/image 2.png",
    "img/vrai_image/image 3.png",
    "img/vrai_image/image 4.png",
    "img/vrai_image/image 5.png",
    "img/vrai_image/image 1.png",
    "img/vrai_image/image 2.png",
    "img/vrai_image/image 3.png",
    "img/vrai_image/image 4.png",
    "img/vrai_image/image 5.png"
];

let position = 0; // debut de l'affichage 
// on recupere les données 
let zoneImages = document.querySelectorAll(".produits-defilement img");
let flecheDroite = document.querySelector(".droite-fleche");
let flecheGauche = document.querySelector(".gauche-fleche");

function afficherImages(){  // tourner les images en mode carrousel si on arrive a la fin du tablezu on recommence 

    for(let i = 0; i < zoneImages.length; i++){

        let numeroImage = position + i;

        if(numeroImage >= images.length){
            numeroImage = numeroImage - images.length;
        }

        zoneImages[i].src = images[numeroImage];

    }

}

if(flecheDroite != null && flecheGauche != null){ // verifie si les fleches existe 

    flecheDroite.addEventListener("click", function(){ // quand on clic la postion augmente si on depasse on revient a 0 on meta jour les images 

        position = position + 1;

        if(position >= images.length){
            position = 0;
        }

        afficherImages();

    });


    flecheGauche.addEventListener("click", function(){

        position = position - 1;

        if(position < 0){
            position = images.length - 1;
        }

        afficherImages();

    });

}



afficherPanier();
compterArticles();// au chargement de debut on affiche le compteur mis a jour et le pnaier vide