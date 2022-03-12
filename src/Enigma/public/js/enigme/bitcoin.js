//###################################################
//  Partie de la génération d'une phrase aléatoire
//###################################################

let prenom1, prenom2, ASCII1, ASCII2, paie, ent, valeurMin, total, val1, val2;

let dico = ["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",
    "Nestor", "Oscar", "Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];

function getPrenom(min, max) {
    let rand = Math.floor(Math.random() * (max - min + 1)) + min;
    return dico[rand];
}


function entierAleratoire(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

//###################################################
//        Récupération du choix de niveau
//###################################################

let select = document.querySelector("#choix");

//###################################################
//           Affichage lors du premier
//             Lancement de la page
//###################################################


let iconeDiff1 = document.querySelector('.diff_1 i');
let boutonDiff1 = document.querySelector('.diff_1');

let boutonDiff2 = document.querySelector('.diff_2');
let iconeDiff2 = document.querySelectorAll('.diff_2 i');

let boutonDiff3 = document.querySelector('.diff_3');
let iconeDiff3 = document.querySelectorAll('.diff_3 i');

if (lvl === 1) {
    iconeDiff1.style.color = 'gold';
} else if (lvl === 2) {
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
} else {
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
}
affichage(lvl);

//###################################################
//           Selection du choix du niveau
//###################################################

boutonDiff1.addEventListener('click', function () {
    affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    affichage(3);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
});


//###################################################
//        Fonction qui permet selon les données
//        de rentrer et de générer l'énigme du niveau
//        demandé
//###################################################

function affichage(niveau) {
    restart();
    document.querySelector("#sendNiveau").value = niveau;
    switch (niveau) {
        case 1:
            prenom1 = 'Alice';
            prenom2 = 'Bob';
            paie = entierAleratoire(1, 9);
            ent = entierAleratoire(1, 100);
            val1 = 5;
            val2 = 7;
            ASCII1 = prenom1.charCodeAt(0);
            ASCII2 = prenom2.charCodeAt(0);
            total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
            break;
        case 2:
            prenom1 = getPrenom(0, 25);
            prenom2 = getPrenom(0, 25);
            paie = entierAleratoire(1, 9);
            ent = entierAleratoire(1, 100);
            val1 = 5;
            val2 = 7;
            while (prenom1 === prenom2) {
                prenom2 = getPrenom(0, 25);
            }
            ASCII1 = prenom1.charCodeAt(0);
            ASCII2 = prenom2.charCodeAt(0);
            total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
            break;
        case 3:
            prenom1 = getPrenom(0, 25);
            prenom2 = getPrenom(0, 25);
            paie = entierAleratoire(1, 9);
            ent = entierAleratoire(1, 100);
            val1 = entierAleratoire(1, 10);
            val2 = entierAleratoire(1, 10);
            while (prenom1 === prenom2) {
                prenom2 = getPrenom(0, 25);
            }
            ASCII1 = prenom1.charCodeAt(0);
            ASCII2 = prenom2.charCodeAt(0);
            total = ASCII1 + ASCII2 + String(paie).charCodeAt(0);
            while (val1 === val2) {
                val2 = entierAleratoire(1, 10);
            }
            break;
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

    document.querySelector('#ennonce').innerHTML = "On cherche H(H(xympn)) tel que H(H(xympn)) soit divisible par " + String(val1) + " et " + String(val2) +
        ".<br> Les valeurs sont hachées à l'aide des codes ASCII, par exemple, pour 59, on a d'abord le hash de 5 puis celui de 9.<br>" +
        "(hash de 59: 53+57=110).<br><br>" + String(prenom1) + " (x = " + prenom1[0] + ") paie " + String(prenom2) + " (y =" + prenom2[0] + ") " + String(paie) + " bitcoins" +
        " (m = " + String(paie) + ").<br> Sachant que p vaut " + String(ent) + ".";

    document.querySelector('#questionRep').innerHTML = "Saurez-vous calculer le plus petit entier n permettant la validation de cette " +
        "transaction entre " + String(prenom1) + " et " + String(prenom2) + " ?";
}

//###################################################
//              Validation
//###################################################

function solution() {
    let val = document.reponse.box.value;
    let verif = 0;

    if (val.trim() === "") {
        document.querySelector(".zone_valid").classList.remove('active');
        document.querySelector(".zone_valid").classList.add('active2');
        return;
    }
    for (let i = 0; i < String(val).length; i++) {
        total += val.charCodeAt(i);
    }
    if (total < valeurMin) {
        document.querySelector(".zone_valid").classList.remove('active');
        document.querySelector(".zone_valid").classList.add('active2');
        return;
    } else {
        for (let i = 0; i < String(total).length; i++) {
            verif += String(total).charCodeAt(i);
        }

        if (verif % val1 === 0) {
            if (verif % val2 === 0) {
                document.querySelector(".zone_valid").classList.add('active');
                document.querySelector("#time").innerHTML = "Félicitations ! vous avez accompli ce niveau en : " + getTimeConvert();
                document.querySelector("#sendClassement").value = getTime();
                resetTimer();
                return;
            }
        }
    }
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.add('active2');
}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}