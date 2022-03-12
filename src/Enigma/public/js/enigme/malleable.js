//###################################################
//          Initialisation des variables
//###################################################

const select = document.querySelector('#choix');
let a, b, m, c;
let rep;
let min, max;

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
//          Fonction qui change les contenus
//               selon le niveau choisi
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
//              Fonction de test
//###################################################

function test(a, b, m) {
    if (isNaN(a) && isNaN(b) && isNaN(m)) {
        alert("La valeur n'est pas un nombre");
    }
}

//###################################################
//              Validation
//###################################################

function solution(reponse) {
    let val = document.reponse.box.value;

    if (isNaN(val)) {
        document.querySelector(".zone_valid").classList.add('active2');
        return trouver;
    }
    if (parseInt(val) === m) {
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
    switch (niveau) {
        case 1:
            min = 1;
            max = 10;
            break;
        case 2:
            min = 1;
            max = 100;
            break;
        case 3:
            min = 1;
            max = 1000;
            break;
    }

    a = Math.trunc(Math.random() * (max - min) + min);
    b = Math.trunc(Math.random() * (max - min) + min);
    m = Math.trunc(Math.random() * (max - min) + min);
    c = a + b + m;

    //#######################################
    //      Définir le contenue de la
    //      page html
    //#######################################

    //Nom de l'énigme
    const nomEnigme = "Chiffrement malléable";
    //Contenue de l'énigme
    const texte = "Dans cette énigme, Alice et Bob utilisent un chiffrement <a href='https://fr.wikipedia.org/wiki/Chiffrement_homomorphe' style='color: #dca05e;'>partiellement homomorphe</a>.<br>Une personne malveillante, Ève, a obtenu ces informations :<br><br>" +
        "- Le chiffré du message " + a + " vaut c × c\'<br> " +
        "- Le chiffré du message " + b + " vaut c × c\'\'<br>" +
        "- Le chiffré du message " + c + " vaut c × c' × c × c'' × c<br>";
    //Question à laquelle l'utilisateurs doit repondre
    const questionReponse = "Saurez-vous découvrir la valeur du message clair qui correspond au message chiffré c ?";


    //################################################
    //              Affichage
    //################################################

    document.querySelector("#contenuePage").innerHTML = texte;
    document.querySelector("#questionRep").innerHTML = questionReponse;

}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}



