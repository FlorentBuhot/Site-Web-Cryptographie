//###################################################
//          Initialisation des variables
//###################################################
const select = document.querySelector('#choix');
let max;
let trouver;

function getRandomInt(maxi) {
    return Math.floor(Math.random() * maxi);
}

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
trouver = affichage(lvl);

//###################################################
//          Fonction qui change les contenue
//               Celon le niveau choisie
//###################################################

boutonDiff1.addEventListener('click', function () {
    trouver = affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    trouver = affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    trouver = affichage(3);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
});


//###################################################
//              Validation
//###################################################

function solution(reponse) {
    const val = document.reponse.box.value;

    if (isNaN(val)) {
        document.querySelector(".zone_valid").classList.add('active2');
    }
    if (parseInt(val) === trouver) {
        document.querySelector(".zone_valid").classList.add('active');
        document.querySelector("#time").innerHTML = "F??licitations ! vous avez accompli ce niveau en : " + getTimeConvert();
        document.querySelector("#sendClassement").value = getTime();
        resetTimer();
    } else {
        document.querySelector(".zone_valid").classList.add('active2');
    }
}

//###################################################
//        Fonction qui permet selon les donn??es
//        de rentrer et de g??nerer l'??nigme du niveau
//        demand??
//###################################################

function affichage(niveau) {
    restart();
    document.querySelector("#sendNiveau").value = niveau;
    let max;
    switch (niveau) {
        case 1:
            max = 10;
            break;
        case 2:
            max = 100;
            break;
        case 3:
            max = 1000;
            break;
    }
    let M = getRandomInt(max);
    let KA = getRandomInt(max);
    let KB = getRandomInt(max);
    let MA = M + KA;
    let MB = MA + KB;
    let RA = MB - KA;
    //#######################################
    //      D??finir le contenu de la
    //      page html
    //#######################################

    //Nom de l'??nigme
    const nomEnigme = "OTP";
    //Contenue de l'??nigme
    let texte = "  <p>Alice Chiffre le message M et envoie le r??sultat ?? Bob qui re??oit : ";
    texte += "<span style='font-weight: 1000;'>" + MA + "</span>";
    texte += "<br>Bob ne peut pas d??chiffrer ce message donc il chiffre le message re??u et renvoi : "
    texte += "<span style='font-weight: 1000;'>" + MB + "</span>";
    texte += "<br>Alice d??chiffre ?? son tour le message et renvoi ?? Bob le nombre : ";
    texte += "<span style='font-weight: 1000;'>" + RA + "</span></p>";
    //Question ?? laquelle l'utilisateur doit r??pondre
    const questionReponse = "Quel est le message M d'Alice ?";


    //################################################
    //              Affichage
    //################################################

    document.querySelector("#contenuePage").innerHTML = texte;
    document.querySelector("#questionRep").innerHTML = questionReponse;

    return M;
}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}
