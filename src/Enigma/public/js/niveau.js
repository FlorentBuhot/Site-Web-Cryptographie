//####################################
//  Déclaration des variables
//###################################

const nbEnigme = 2;             //Nombre d'énigmes lister
const difficulte = [2, 2];      //Liste des difficultés par énigme 2 pour la première ect
const fait = [1, 0];

//####################################
//  Affichage de la difficulté pour
//      chaque enigme
//####################################

let enigme;
for (let n = 1; n <= nbEnigme; n++) {
    enigme = n.toString();
    for (let i = 1; i <= difficulte[n - 1]; i++) {
        niveau = i.toString();            //On transforme l'indice de l'étoile de difficulté actuel en string car de base i est un int
        document.querySelector(enigme + "etoile" + niveau).innerHTML = "<i class='bx bxs-star' ></i>";
    }
}

for (let n = 1; n <= nbEnigme; n++) {
    enigme = n.toString();
    if (fait[n - 1] === 1) {
        document.querySelector(enigme + "fait").innerHTML = "<i class='bx bxs-message-square-check' ></i>";
    }
}

