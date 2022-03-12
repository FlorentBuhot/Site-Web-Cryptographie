//###################################################
//          Initialisation des variables
//###################################################

const select = document.querySelector('#choix');
let rep;

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
rep = affichage(lvl);

//###################################################
//          Fonction qui change les contenue
//               Celon le niveau choisie
//###################################################

boutonDiff1.addEventListener('click', function () {
    rep = affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    rep = affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    rep = affichage(3);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
});


//###################################################
//              Fonction de test
//###################################################


//###################################################
//              Validation
//###################################################

function solution(reponse) {
    test = document.reponse.box.value;
    if (test.trim() === "") {
        document.querySelector(".zone_valid").classList.add('active2');
    }
    if (parseInt(test) === parseInt(rep)) {
        document.querySelector(".zone_valid").classList.add('active');
        document.querySelector("#time").innerHTML = "Félicitations ! vous avez accompli ce niveau en : " + getTimeConvert();
        document.querySelector("#sendClassement").value = getTime();
        resetTimer();
    } else {
        document.querySelector(".zone_valid").classList.add('active2');
    }
}

//###################################################
//        Fonction qui permet selon les données
//        de rentrer et de génerer l'énigme du niveau
//        demandé
//###################################################

function affichage(niveau) {
    restart();
    document.querySelector("#sendNiveau").value = niveau;

    function getRandomIntInclusive(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    let vitesseProc = getRandomIntInclusive(27, 34) / 10;
    let nbCoeur = getRandomIntInclusive(1, 8);
    let nbCarac = getRandomIntInclusive(6, 13);
    let nbCaracTot = 105;
    let annee = getRandomIntInclusive(80, 10000);
    let nbOp;
    let rep;
    let texte = "";
    let questionReponse;

    //#######################################
    //      Définir le contenue de la
    //      page html
    //#######################################

    switch (niveau) {
        case 1:
            texte += "Soit un mot de passe de " + nbCarac + " caractères.<br><br>";
            texte += "Sachant que :<br>";
            texte += "Il y a " + nbCaracTot + " caractères disponibles pour former un mot de passe.<br>";
            texte += "La vitesse du processeur est de " + vitesseProc + " GHz et il a " + nbCoeur + " coeur(s).<br>";
            nbOp = vitesseProc * 1000000 * nbCoeur;
            let nbOpTrouveMdp = (nbCaracTot) ** nbCarac;
            rep = Math.floor((nbOpTrouveMdp / nbOp) / (60 * 60 * 24));
            if (rep > 365) {
                rep = Math.floor((nbOpTrouveMdp / nbOp) / (60 * 60 * 24 * 365));
                questionReponse = 'En considérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en année pour un ordinateur actuel de craquer le mot de passe ?';
            } else if (rep < 1) {
                rep = Math.floor((nbOpTrouveMdp / nbOp) / (60 * 60));
                questionReponse = 'En considérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en heure pour un ordinateur actuel de craquer le mot de passe ?';
            } else {
                questionReponse = 'En considérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en jour pour un ordinateur actuel de craquer le mot de passe ?';
            }
            break;
        case 2:
            texte += 'Soit un ordinateur avec un processeur de ' + vitesseProc + ' GHz avec ' + nbCoeur + ' coeur(s).<br>';
            nbOp = vitesseProc * 1000000 * nbCoeur;
            rep = nbOp * annee;
            questionReponse = 'Saurez-vous retrouver le nombre de mots de passe calculé par cet ordinateur en ' + annee + ' an(s) ?';
            break;
        case 3:
            texte += 'Soit : <br>';
            texte += 'Un nombre de ' + nbCaracTot + ' caractères disponibles pour former un mot de passe.<br>';
            texte += 'La vitesse du processeur est de ' + vitesseProc + ' GHz et il a ' + nbCoeur + ' coeur(s).<br>';
            nbOp = vitesseProc * 1000000 * nbCoeur;
            rep = Math.ceil(Math.log(nbOp * annee * 60 * 60 * 24 * 365) / Math.log(nbCaracTot));
            questionReponse = 'Saurez-vous calculer le nombre de caractères pour que l\'ordinateur puisse craquer le mot de passe en ' + annee + ' années ?';
            break;
    }

    //################################################
    //              Affichage
    //################################################
    document.querySelector("#contenuePage").innerHTML = texte;
    document.querySelector("#questionRep").innerHTML = questionReponse;
    return rep;

}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}

