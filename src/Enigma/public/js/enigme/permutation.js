//###################################################
//  Partie de la génération d'une phrase aléatoire 
//###################################################

let prenom = ["Loris", "Maël", "William", "Léopold", "Florent", "Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory", "Nestor", "Oscar", "Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend', 'pique', 'casse', 'vole', 'contemple', 'attrape', 'distribue', 'aime'];
let determinant = ['des', 'les', 'ses', 'ces'];
let adjectif = ['jolis', 'magnifiques', 'gros', 'petits'];
let noms = ['stylos', 'feutres', 'effaceurs', 'rapporteurs', 'ordinateurs', 'claviers', 'sacs', 'bureau'];
let liaison = ['et', 'plus', 'avec', 'après'];

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
    phrase.push(noms[y] + ".");
    return phrase;
}

//###################################################
//        Récupération du choix de niveau 
//###################################################

let select = document.querySelector("#choix");
document.querySelector('#questionRep').innerHTML = "Ce brouillon a été trouvé dans la cave d'un bâtiment de l'US Navy." +
    "<br> Un message chiffré et secret est caché dans ce texte, saurez-vous le découvrir ?" +
    "<br>Attention, la ponctuation peut être trompeuse.";

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

message = affichage(lvl);

//###################################################
//           Selection du choix du niveau 
//###################################################


boutonDiff1.addEventListener('click', function () {
    this.message = affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    this.message = affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    this.message = affichage(3);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
});

//###################################################
//              Fonction de l'énigme 
//               et de son affichage
//###################################################

function affichage(niveau) {
    restart();
    document.querySelector("#sendNiveau").value = niveau;
    const phrase = "À qui de droit, J'ai aussi remarqué que les Allemands utilisent des astuces phonétiques pour rendre la cryptanalyse plus difficile.";
    const s = "Le message secret est :";
    let tab_mois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    let ladate = new Date();
    const date = "Le " + ladate.getDate() + " " + tab_mois[ladate.getMonth()] + " " + ladate.getFullYear() + " à Washington D.C.";
    const sign = "Elizabeth Smith Friedman.";

    const msgTab = permut(phrase, niveau).split("");
    msgTab.splice(15, 0, "<br>");
    const msgR = msgTab.join("").split(' ').join("&#9141;");

    const dateR = permut(date, niveau).split(' ').join("&#9141;");

    this.message = phrase9carc().join(" ");
    const secretR = permut(this.message, niveau).split(' ').join("&#9141;");
    const s2 = permut(s, niveau).split(' ').join("&#9141;");
    const sign2 = permut(sign, niveau).split(' ').join("&#9141;");

    let text = "";
    text += "<p class='right'>" + dateR + "</p><br>";
    text += msgR + "<br>";
    text += s2 + "<br>" + secretR + "<br>";
    text += sign2;

    document.querySelector("#contenuePage").innerHTML = text;

    return this.message;
}

//###################################################
//        fonction de permutation des groupes
//         de lettres selon le niveau choisi
//###################################################

function permut(p, niveau) {
    let tab;
    if (niveau === 1) {
        tab = p.toString().split("");
    } else {
        tab = p.toString().replace(/ /g, "").split("");
    }

    let result = "";
    let i = 0;
    let a, b, c, d, e, f, g;
    let groupe;
    switch (niveau) {
        case 1:
            for (i = 0; i < tab.length - 2; i += 3) {
                a = tab[i];
                b = tab[i + 1];
                c = tab[i + 2];
                groupe = c + a + b;
                result += groupe;
            }
            break;
        case 2:
            for (i = 0; i < tab.length - 4; i += 5) {
                a = tab[i];
                b = tab[i + 1];
                c = tab[i + 2];
                d = tab[i + 3];
                e = tab[i + 4];
                groupe = d + e + c + a + b;
                result += groupe;
            }
            break;
        case 3:
            for (i = 0; i < tab.length - 6; i += 7) {
                a = tab[i];
                b = tab[i + 1];
                c = tab[i + 2];
                d = tab[i + 3];
                e = tab[i + 4];
                f = tab[i + 5];
                g = tab[i + 6];
                groupe = e + d + c + g + a + f + b;
                result += groupe;
            }
            break;

    }
    if (i < tab.length) {
        for (i; i < tab.length; i++) {
            result += tab[i];
        }
    }
    return result;
}

//###################################################
//      fonction de validation de la réponse
//###################################################

function solution() {
    const Reponse = document.reponse.box.value;

    if (reform(Reponse) === reform(this.message)) {
        document.querySelector(".zone_valid").classList.add('active');
        document.querySelector("#time").innerHTML = "Félicitations ! vous avez accompli ce niveau en : " + getTimeConvert();
        document.querySelector("#sendClassement").value = getTime();
        resetTimer();
    } else if (Reponse === "") {
        document.querySelector(".zone_valid").classList.remove('active');
        document.querySelector(".zone_valid").classList.add('active2');
    } else {
        document.querySelector(".zone_valid").classList.remove('active');
        document.querySelector(".zone_valid").classList.add('active2');
    }
}

document.querySelector('#box').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        document.querySelector('#reponse').click();
    }
});

//###################################################
//      fonction utilisée pour transposer la
//      réponse et la solution au même format
//##################################################

function reform(s) {
    return s.trim().normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().split(" ").join("");
}

function closeCont() {
    document.querySelector(".zone_valid").classList.remove('active');
    document.querySelector(".zone_valid").classList.remove('active2');
}
