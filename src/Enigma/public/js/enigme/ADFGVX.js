//###################################################
//  Partie de la génération d'une phrase aléatoire
//###################################################

let dico;
let code;
let lettres = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];

let prenom = ["Loris", "Maël", "William", "Léopold", "Florent", "Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory", "Nestor", "Oscar", "Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend', 'pique', 'casse', 'vole', 'contemple', 'attrape', 'distribue', 'aime'];
let determinant = ['des', 'les', 'ses', 'ces'];
let adjectif = ['jolis', 'magnifiques', 'gros', 'petits'];
let noms = ['stylos', 'feutres', 'effaceurs', 'rapporteurs', 'ordinateurs', 'claviers', 'sacs', 'bureaux'];
let liaison = ['et', 'plus', 'avec', 'après'];
let tab_mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
let ladate = new Date();
let intro = ("Le " + ladate.getDate() + " " + tab_mois[ladate.getMonth()] + " " + ladate.getFullYear() + " à Bletchley Park,");
let aqdd = ("À qui de droit,");
let signe = ("Alan Turing.");
let outro = ("Post-Scriptum: buvez de ce whisky que le patron juge fameux.");

let phrase;

function phrase9carc() {
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random() * prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random() * verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random() * determinant.length)]);
    a = Math.floor(Math.random() * adjectif.length);
    phrase.push(adjectif[a]);
    b = Math.floor(Math.random() * noms.length);
    phrase.push(noms[b]);
    phrase.push(liaison[Math.floor(Math.random() * liaison.length)]);
    phrase.push(determinant[Math.floor(Math.random() * determinant.length)]);
    let y = Math.floor(Math.random() * adjectif.length);
    while (a === y) {
        y = Math.floor(Math.random() * adjectif.length);
    }
    phrase.push(adjectif[y]);
    y = Math.floor(Math.random() * noms.length);
    while (y === b) {
        y = Math.floor(Math.random() * noms.length);
    }
    phrase.push(noms[y]);
    phrase.push(".");
    return phrase;
}


function phraseFin(inputArray) {
    let phraseFinal = '';
    let i = 0;
    inputArray.forEach(element => {
        i++;
        if (i === inputArray.length - 1) {
            phraseFinal += element;
        } else {
            phraseFinal += element + ' ';
        }
    });
    phraseFinal = phraseFinal.substring(0, phraseFinal.length - 1);
    return phraseFinal;
}


function strNoAccent(a) {
    let b = "áàâäãåçéèêëíïîìñóòôöõúùûüýÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ",
        c = "aaaaaaceeeeiiiinooooouuuuyAAAAAACEEEEIIIINOOOOOUUUUY",
        d = "";
    for (let i = 0, j = a.length; i < j; i++) {
        let e = a.substr(i, 1);
        d += (b.indexOf(e) !== -1) ? c.substr(b.indexOf(e), 1) : e;
    }
    return d;
}

function chiffrer(a) {
    let nouvMes = "";
    a = a.toLowerCase();
    a = strNoAccent(a);
    for (let i = 0; i < a.length; i++) {
        if (a[i] === "," || a[i] === "." || a[i] === ":" || a[i] === "-") {
            nouvMes = nouvMes.substring(0, nouvMes.length - 1);
            nouvMes = nouvMes + a[i];
        } else if (a[i] === " ")
            nouvMes = nouvMes + " ";
        else {
            nouvMes += code[dico.indexOf(a[i])] + " ";
        }
    }
    return nouvMes;
}

function entierAleratoire(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function getRandomLettre() {
    let tmp = [];
    for (let i = 0; i < 6; i++) {
        let val = entierAleratoire(0, 25)
        while (tmp.indexOf(val) !== -1)
            val = entierAleratoire(0, 25)
        tmp.push(val)
    }
    for (let i = 0; i < 6; i++) {
        tmp[i] = lettres[tmp[i]];
        tmp[i] = tmp[i].toUpperCase()
    }
    return tmp;
}

function newCode(listeLettres) {
    code = [];
    for (let i = 0; i < 6; i++) {
        for (let j = 0; j < 6; j++) {
            code.push(listeLettres[i] + listeLettres[j]);
        }
    }
    return code;
}

function randomizeDico(tab) {
    let i, j, tmp;
    for (i = tab.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        tmp = tab[i];
        tab[i] = tab[j];
        tab[j] = tmp;
    }
    return tab;
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
    phrase = phrase9carc();
    phrase = phraseFin(phrase);
    let introChiffre;
    let aqddChifffre;
    let signeChiffre;
    let outroChiffre;
    let phraseChiffre;
    let messageChiffre;
    let randLettres;
    let titre;
    let citation;
    switch (niveau) {
        case 1:
            dico = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            code = ['AA', 'AD', 'AF', 'AG', 'AV', 'AX', 'DA', 'DD', 'DF', 'DG', 'DV', 'DX', 'FA', 'FD', 'FF', 'FG', 'FV', 'FX', 'GA', 'GD', 'GF', 'GG', 'GV', 'GX', 'VA', 'VD', 'VF', 'VG', 'VV', 'VX', 'XA', 'XD', 'XF', 'XG', 'XV', 'XX'];
            titre = "ADFGVX";
            citation = "L’intelligence est, hélas ! toujours une énigme, mais pas plus que la bêtise...";
            introChiffre = chiffrer(intro);
            aqddChifffre = chiffrer(aqdd);
            signeChiffre = chiffrer(signe);
            outroChiffre = chiffrer(outro);
            phraseChiffre = chiffrer(phrase);
            messageChiffre = chiffrer(phrase);
            break;
        case 2:
            dico = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            randLettres = getRandomLettre();
            titre = "";
            randLettres.forEach(element => titre += element);
            citation = "Le génie n’est pas celui qui croit mais celui qui saisit la progression des choses.";
            code = newCode(randLettres);
            introChiffre = chiffrer(intro);
            aqddChifffre = chiffrer(aqdd);
            signeChiffre = chiffrer(signe);
            outroChiffre = chiffrer(outro);
            phraseChiffre = chiffrer(phrase);
            messageChiffre = chiffrer(phrase);
            break;
        case 3:
            dico = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            randLettres = getRandomLettre();
            titre = "";
            randLettres.forEach(element => titre += element);
            citation = "Les mathématiciens ont toujours aimé les problèmes pour le plaisir d’en créer de nouveaux.";
            code = newCode(randLettres);
            dico = randomizeDico(dico);
            introChiffre = chiffrer(intro);
            aqddChifffre = chiffrer(aqdd);
            signeChiffre = chiffrer(signe);
            outroChiffre = chiffrer(outro);
            phraseChiffre = chiffrer(phrase);
            messageChiffre = chiffrer(phrase);
            break;
        default:
            alert("Erreur dans la sélection de niveau, veuillez recommencer.");
            break;
    }
//###################################################
//      Définir le contenue de la
//      page html
//###################################################

//################################################
//              Affichage
//################################################

    document.querySelector("#ennonce").innerHTML = "Dans le 1er cadre, vous pouvez voir une lettre en clair.<br>" +
        "Dans le 2nd cadre, vous pouvez voir une lettre chiffrée.<br>";
    document.querySelector("#intro").innerHTML = intro;
    document.querySelector("#aqdd").innerHTML = aqdd;
    document.querySelector("#citation").innerHTML = citation;
    document.querySelector("#signe").innerHTML = signe;
    document.querySelector("#outro").innerHTML = outro;
    document.querySelector("#introChiffre").innerHTML = introChiffre;
    document.querySelector("#aqddChifffre").innerHTML = aqddChifffre;
    document.querySelector("#signeChiffre").innerHTML = signeChiffre;
    document.querySelector("#outroChiffre").innerHTML = outroChiffre;
    document.querySelector("#messageChiffre").innerHTML = messageChiffre;
    document.querySelector('#questionRep').innerHTML = "Les deux lettres précédentes ont été retrouvés au même moment, au même endroit." +
        "<br>Arriverez-vous à retrouver le message secret ?" +
        "<br>Attention, la ponctuation peut être trompeuse.";

}

//###################################################
//              Validation
//###################################################

function solution() {
    let val = document.reponse.box.value;

    if (reform(val) === "") {
        document.querySelector(".zone_valid").classList.add('active2');
    } else if (reform(val) === reform(phrase)) {
        document.querySelector(".zone_valid").classList.add('active');
        document.querySelector("#time").innerHTML = "Félicitations ! vous avez accompli ce niveau en : " + getTimeConvert();
        document.querySelector("#sendClassement").value = getTime();
        resetTimer();
    } else {
        document.querySelector(".zone_valid").classList.add('active2');
    }
}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}

function reform(s) {
    return s.trim().normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().split(" ").join("");
}