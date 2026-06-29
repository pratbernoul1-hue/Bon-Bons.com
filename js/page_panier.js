let listePanier = document.getElementById("liste-panier");
let nombrePanier = document.getElementById("nombre-panier"); // recupere des elements mettre a jour le nombre au header 

let panier = [];


if(localStorage.getItem("panier") != null){ // parti panier existe deja memoire du navigateur 
    panier = JSON.parse(localStorage.getItem("panier")); // recupere les données sous le nom panier, sous forme de texte les données
}



function sauvegarderPanier(){
    localStorage.setItem("panier", JSON.stringify(panier)); // transforme le tableau en texte pour l'enregitsrer 
}



function compterArticles(){ // nombre articles dans le panier 

    let total = 0;

    for(let i = 0; i < panier.length; i++){
        total = total + panier[i].quantite;
    }

    if(nombrePanier != null){
        nombrePanier.textContent = total;
    }
}



function afficherPagePanier(){ // affiche les produit dans le panier 

    listePanier.innerHTML = "";

    for(let i = 0; i < panier.length; i++){ /// chaque tour un produit 

        let produit = document.createElement("div");
        produit.className = "produit-page-panier"; // div chaque produit

        let image = document.createElement("img");
        image.src = panier[i].image;

        let infos = document.createElement("div");
        infos.className = "infos-panier";

        let nom = document.createElement("h3");
        nom.textContent = panier[i].nom;

        let prix = document.createElement("p");
        prix.textContent = panier[i].prix;

        infos.appendChild(nom);
        infos.appendChild(prix);

        let zoneQuantite = document.createElement("div");
        zoneQuantite.className = "quantite-panier";

        let boutonMoins = document.createElement("button");
        boutonMoins.textContent = "-";

        let nombreProduit = document.createElement("span");
        nombreProduit.className = "nombre-page-panier";
        nombreProduit.textContent = panier[i].quantite;

        let boutonPlus = document.createElement("button");
        boutonPlus.textContent = "+";

        let boutonSupprimer = document.createElement("button");
        boutonSupprimer.className = "supprimer-page";
        boutonSupprimer.textContent = "🗑️";

        zoneQuantite.appendChild(boutonMoins);
        zoneQuantite.appendChild(nombreProduit);
        zoneQuantite.appendChild(boutonPlus);
        zoneQuantite.appendChild(boutonSupprimer);

        produit.appendChild(image);
        produit.appendChild(infos);
        produit.appendChild(zoneQuantite);

        listePanier.appendChild(produit);


        boutonPlus.addEventListener("click", function(){

            panier[i].quantite = panier[i].quantite + 1;

            sauvegarderPanier();
            afficherPagePanier();
            compterArticles();

        });


        boutonMoins.addEventListener("click", function(){

            if(panier[i].quantite > 1){
                panier[i].quantite = panier[i].quantite - 1;
            }

            sauvegarderPanier();
            afficherPagePanier();
            compterArticles();

        });


        boutonSupprimer.addEventListener("click", function(){

            panier.splice(i, 1);

            sauvegarderPanier();
            afficherPagePanier();
            compterArticles();

        });

    }
}



afficherPagePanier();
compterArticles();