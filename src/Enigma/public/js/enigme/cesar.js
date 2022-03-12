//###################################################
//          Initialisation des variables
//###################################################
const le = "Le ";
const select = document.querySelector('#choix');
let phraseV;

let prenom = ["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory", "Nestor", "Oscar", "Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend', 'mange', 'casse', 'vole', 'contemple', 'attrape', 'distribue'];
let noms = ['stylos', 'feutres', 'pommes', 'craies', 'gommes', 'effaceurs', 'rapporteurs'];

function sub(a, rdn) {
    let nouvMes = "";
    let nouv;
    for (let i = 0; i < a.length; i++) {
        nouv = a.charCodeAt(i) + rdn;//décalage du code ascii des lettres
        //if pour faire le tri avec les différents caractères qui ne sont pas des lettres et qui ne sont pas '/' qui eux ne doivent pas être modifiés;
        if (a[i] === " " || a[i] === "," || a[i] === "." || a[i] === ":" || a[i] === "'" || a[i] === "-") {
            nouvMes = nouvMes + a[i];
        }
        //if pour tester si le caractère a[i] est '/' pour le transformer en saut de ligne en html
        else if (a[i] === "/") {
            nouvMes = nouvMes + "<br />";
        }
        //modification de la lettres avec le décalage
        else {
            //si le code ascii est trop haut le modifier pour qu'il retombe sur une lettre correcte
            if (nouv > 122) {
                nouv = nouv - 26;
            }
            //ajout de la lettre une fois modifiée aux messages chiffrés
            nouvMes = nouvMes + String.fromCharCode(nouv);
        }
    }
    //renvoi du message une fois chiffré
    return nouvMes;
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
phraseV = affichage(lvl);

//###################################################
//              Affichage
//###################################################  
document.querySelector("#questionRep").innerHTML = "Saurez-vous trouver le message secret ?<br>Attention, la ponctuation peut être trompeuse.";


//###################################################
//           Selection du choix du niveau 
//###################################################

boutonDiff1.addEventListener('click', function () {
    phraseV = affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    phraseV = affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    phraseV = affichage(3);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'gold';
    });
});

function affichage(niveau) {
    restart();
    let prenomrdn;
    let verberdn;
    let nomsrdn;
    let date;
    let rdn;
    let nouv;
    let phrase;
    let phraseC;
    let phraseLower;
    let msgC;
    document.querySelector("#sendNiveau").value = niveau;
    prenomrdn = prenom[Math.floor(Math.random() * prenom.length)];
    verberdn = verbe[Math.floor(Math.random() * verbe.length)];
    nomsrdn = noms[Math.floor(Math.random() * noms.length)];
    date = new Date().toLocaleDateString();
    phrase = prenomrdn + " " + verberdn + " des " + nomsrdn + ".";
    phraseC = "Aux connaisseurs,/ Nous savons depuis peu quelle est la raison de ces comportements bizarres,/c'est certain que nous pouvons le dire, la clef secrète est :/" + phrase + "//post-scriptum : voyez ce koala fou qui mange des journaux et des photos dans un bungalow.";
    phraseLower = phraseC.toLowerCase();
    switch (niveau) {
        case 1:
            rdn = 1;
            msgC = sub(phraseLower, rdn);
            document.querySelector("#dateNC").innerHTML = le + date;
            document.querySelector("#dateC").innerHTML = sub(le.toLowerCase(), rdn) + date;
            document.querySelector("#msgC").innerHTML = msgC;
            break;
        case 2:

            rdn = Math.floor(Math.random() * 23) + 2;

            msgC = sub(phraseLower, rdn);
            document.querySelector("#dateNC").innerHTML = le + date;
            document.querySelector("#dateC").innerHTML = sub(le.toLowerCase(), rdn) + date;
            document.querySelector("#msgC").innerHTML = msgC;
            break;
        case 3:
            let alphabet = [];
            let alphabetMod = [];
            for (let j = 0; j < 26; j++) {
                alphabet[j] = String.fromCharCode(97 + j)
            }
            phrase = prenomrdn + " " + verberdn + " des " + nomsrdn + ".";
            for (let k = 0; k < 26; k++) {
                rdn = Math.floor(Math.random() * alphabet.length);
                alphabetMod[k] = alphabet[rdn];
                alphabet.splice(rdn, 1)
            }
            phraseLower = phraseC.toLowerCase();
            msgC = subcomplexe(phraseLower);
            document.querySelector("#dateNC").innerHTML = le + date;
            document.querySelector("#dateC").innerHTML = subcomplexe(le.toLowerCase(), rdn) + date;
            document.querySelector("#msgC").innerHTML = msgC;

        function subcomplexe(a) {
            let nouvMes = "";
            for (let i = 0; i < a.length; i++) {
                nouv = a.charCodeAt(i);
                if (a[i] === " " || a[i] === "," || a[i] === "." || a[i] === ":" || a[i] === "'" || a[i] === "-") {
                    nouvMes = nouvMes + a[i];
                } else if (a[i] === "/") {
                    nouvMes = nouvMes + "<br />"
                } else {
                    nouvMes = nouvMes + alphabetMod[nouv - 97];
                }
            }
            return nouvMes;
        }

            break;
    }
    return phrase;
}

function solution() {
    let reponse = document.reponse.box.value;

    reponse.trim();
    if (reponse === "") {
        document.querySelector(".zone_valid").classList.add('active2');
    } else if (reponse.toLowerCase() === phraseV.toLowerCase()) {
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

