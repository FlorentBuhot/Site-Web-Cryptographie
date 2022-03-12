//###################################################
//  Partie de la génération d'une phrase aléatoire
//###################################################

let prenom1, prenom2, ASCII1, ASCII2, paie, ent, valeurMin, total, val1, val2;

let dico = ["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",
    "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];

function getPrenom(min, max){
    let rand = Math.floor(Math.random() * (max-min + 1)) + min;
    return dico[rand];
}


function entierAleratoire(min, max){
    return Math.floor(Math.random() * (max-min + 1)) + min;
}

//###################################################
//        Récupération du choix de niveau
//###################################################

let select = document.getElementById("choix");

//###################################################
//           Affichage lors du premier
//             Lancement de la page
//###################################################

let niveau = 1;
affichage(niveau);

//###################################################
//           Selection du choix du niveau
//###################################################

select.addEventListener('change', function (){
    let valeur = select.options[select.selectedIndex].value;
    valeur = parseInt(valeur);

    switch (valeur) {
        case 1:
            affichage(1);
            break;
        case 2:
            affichage(2);
            break;
        case 3:
            affichage(3);
            break;
        default:
            console.log('default');
    }

});

//###################################################
//        Fonction qui permet celon les données
//        rentrer génerer l'enigme du niveau
//        demander
//###################################################

function affichage(niveau) {
    if (niveau === 1) {
        prenom1 = 'Alice';
        prenom2 = 'Bob';
        paie = entierAleratoire(1, 9);
        ent = entierAleratoire(1, 100);
        val1 = 5;
        val2 = 7;
        ASCII1 = prenom1.charCodeAt(0);
        ASCII2 = prenom2.charCodeAt(0);
        total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
    } else if (niveau === 2) {
         prenom1 = getPrenom(0,25);
         prenom2 = getPrenom(0,25);
         paie = entierAleratoire(1,9);
         ent = entierAleratoire(1,100);
         val1 = 5;
         val2 = 7;
        while(prenom1 === prenom2){
            prenom2 = getPrenom(0,25);
        }
        ASCII1 = prenom1.charCodeAt(0);
        ASCII2 = prenom2.charCodeAt(0);
        total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
    } else if (niveau === 3) {
         prenom1 = getPrenom(0,25);
         prenom2 = getPrenom(0,25);
         paie = entierAleratoire(1,9);
         ent = entierAleratoire(1,100);
         val1 = entierAleratoire(1,10);
         val2 = entierAleratoire(1,10);
        while(prenom1 === prenom2){
            prenom2 = getPrenom(0,25);
        }
        ASCII1 = prenom1.charCodeAt(0);
        ASCII2 = prenom2.charCodeAt(0);
        total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
        while(val1 === val2){
            val2 = entierAleratoire(1,10);
        }
    } else {
        alert("Erreur dans la séléction de niveau,veuillez recommencer");
    }
//###################################################
//      Définir le contenue de la
//      page html
//###################################################


    for (let i = 0; i < String(ent).length; i++) {
        total += String(ent).charCodeAt(i);
    }
    valeurMin = total + 48;

//################################################
//              Affichage
//################################################

    document.getElementById("ennonce").innerHTML = "On cherche H(H(xympn)) tel que H(H(xympn)) soit divisible par " + String(val1) + " et " + String(val2) +
        ".<br> Les valeurs sont hachées à l'aide des codes ASCII, par exemple, pou 59, on a d'abors le hash de 5 pui celui de 9." +
        "(hash de 59: 53+57=110).<br><br>" + String(prenom1) + " (x = " + prenom1[0] + ") paye " + String(prenom2) + " (y =" + prenom2[0] + ") " + String(paie) + " bitcoins" +
        " (m = " + String(paie) + ").<br> Sachant que p vaut " + String(ent) + ", saurez-vous calculer le plus petit entier n permettant la validation de cette " +
        "transaction entre " + String(prenom1) + " et " + String(prenom2) + " ?";
}

//###################################################
//              Validation
//###################################################

function solution() {
    let val = document.reponse.box.value;
    let verif = 0;
    if (val.trim() === "") {
        alert("veuillez répondre avant de valider !");
        return;
    }
    for (let i = 0; i < String(val).length; i++) {
        total += val.charCodeAt(i);
    }
    if (total < valeurMin) {
        alert("Ce n'est pas la bonne réponse, cherchez encore !");
        return;
    } else {
        for (let i = 0; i < String(total).length; i++) {
            verif += String(total).charCodeAt(i);
        }
        if (verif % val1 === 0) {
            if (verif % val2 === 0) {
                alert("Bien joué !");
                return;
            }
        }
    }
    alert("Ce n'est pas la bonne réponse, cherchez encore !");
}