//###################################################
//  Partie de la génération d'une phrase aléatoire
//###################################################

let dico;
let code;

let prenom =["Loris","Maël","William","Léopold","Florent","Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",  "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','pique','casse','vole','contemple','attrape','distribue','aime'];
let determinant = ['des','les','ses','ces'];
let adjectif = ['jolis','magnifiques','gros','petit'];
let noms = ['stylos','feutres','effaceurs','rapporteurs','ordinateurs','claviers','sacs','bureau'];
let liaison = ['et','plus','avec','après'];

let intro = ("Le 27 avril 1942 à Bletchley Park,");
let aqdd = ("À qui de droit,");
let signe = ("Alan Turing.");
let outro = ("Post-Scriptum: Buvez de ce whisky que le patron juge fameux.");

let phrase;

function phrase9carc(){
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random()*prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random()*verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    a = Math.floor(Math.random()*adjectif.length);
    phrase.push(adjectif[a]);
    b = Math.floor(Math.random()*noms.length);
    phrase.push(noms[b]);
    phrase.push(liaison[Math.floor(Math.random()*liaison.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    let y = Math.floor(Math.random()*adjectif.length);
    while(a === y){
        y = Math.floor(Math.random()*adjectif.length);
    }
    phrase.push(adjectif[y]);
    y = Math.floor(Math.random()*noms.length);
    while (y === b) {
        y = Math.floor(Math.random()*noms.length);
    }
    phrase.push(noms[y]);
    phrase.push(".");
    return phrase;
}


function phraseFin(inputArray){
    let phraseFinal = '';
    let i = 0;
    inputArray.forEach(element => {
        i++;
        if(i === inputArray.length - 1){
            phraseFinal += element;
        }
        else{
            phraseFinal += element + ' ';
        }
    });
    phraseFinal = phraseFinal.substring(0, phraseFinal.length - 1);
    return phraseFinal;
}


function strNoAccent(a) {
    let b="áàâäãåçéèêëíïîìñóòôöõúùûüýÁÀÂÄÃÅÇÉÈÊËÍÏÎÌÑÓÒÔÖÕÚÙÛÜÝ",
        c="aaaaaaceeeeiiiinooooouuuuyAAAAAACEEEEIIIINOOOOOUUUUY",
        d="";
    for(let i = 0, j = a.length; i < j; i++) {
        let e = a.substr(i, 1);
        d += (b.indexOf(e) !== -1) ? c.substr(b.indexOf(e), 1) : e;
    }
    return d;
}

function chiffrer(a){
    let nouvMes = "";
    a = a.toLowerCase();
    a = strNoAccent(a);
    for(let i=0;i<a.length;i++){
        if(a[i] === "," || a[i] === "." || a[i] === ":" || a[i] === "-") {
            nouvMes = nouvMes.substring(0, nouvMes.length - 1);
            nouvMes = nouvMes + a[i];
        }
        else if(a[i] === " ")
            nouvMes = nouvMes + " ";
        else{
            nouvMes += code[dico.indexOf(a[i])] + " ";
        }
    }
    return nouvMes;
}

function entierAleratoire(min, max){
    return Math.floor(Math.random() * (max-min + 1)) + min;
}
function getRandomLettre() {
    let tmp = [];
    for (let i = 0; i < 6; i++) {
        let val = entierAleratoire(0,25)
        while (tmp.indexOf(val) !== -1)
            val = entierAleratoire(0, 25)
        tmp.push(val)
    }
    for (let i = 0; i < 6; i++) {
        tmp[i] = dico[tmp[i]];
        tmp[i] = tmp[i].toUpperCase()
    }
    return tmp;
}

function newCode(listeLettres){
    code = [];
    for(let i = 0; i < 6; i++){
        for(let j = 0; j < 6; j++){
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
    switch (niveau){
        case 1:
            dico = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'];
            code = ['AA','AD','AF','AG','AV','AX','DA','DD','DF','DG','DV','DX','FA','FD','FF','FG','FV','FX','GA','GD','GF','GG','GV','GX','VA','VD','VF','VG','VV','VX','XA','XD','XF','XG','XV','XX'];
            titre = "ADFGVX";
            citation ="L’intelligence est, hélas ! toujours une énigme, mais pas plus que la bêtise...";
            introChiffre = chiffrer(intro);
            aqddChifffre = chiffrer(aqdd);
            signeChiffre = chiffrer(signe);
            outroChiffre = chiffrer(outro);
            phraseChiffre = chiffrer(phrase);
            messageChiffre = chiffrer(phrase);
            break;
        case 2:
            dico = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','0','1','2','3','4','5','6','7','8','9'];
            randLettres = getRandomLettre();
            titre = "";
            randLettres.forEach(element => titre+= element);
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
            randLettres = getRandomLettre();
            titre = "";
            randLettres.forEach(element => titre+= element);
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
            alert("Erreur dans la séléction de niveau,veuillez recommencer");
            break;
    }
//###################################################
//      Définir le contenue de la
//      page html
//###################################################

//################################################
//              Affichage
//################################################
    document.getElementById("titre").innerHTML = titre;
    document.getElementById("ennonce").innerHTML = "Dans le 1er cadre, vous pouvez voir une lettre en claire.<br>" +
        "Dans le 2nd cadre, vous pouvez voir une lettre chiffée.<br>" +
        "Arriverez vous à retrouver le message secret ?";
    document.getElementById("intro").innerHTML = intro;
    document.getElementById("aqdd").innerHTML = aqdd;
    document.getElementById("citation").innerHTML = citation;
    document.getElementById("signe").innerHTML = signe;
    document.getElementById("outro").innerHTML = outro;
    document.getElementById("introChiffre").innerHTML = introChiffre;
    document.getElementById("aqddChifffre").innerHTML = aqddChifffre;
    document.getElementById("signeChiffre").innerHTML = signeChiffre;
    document.getElementById("outroChiffre").innerHTML = outroChiffre;
    document.getElementById("messageChiffre").innerHTML = messageChiffre;

}

//###################################################
//              Validation
//###################################################

function solution() {
    let val = document.reponse.box.value;
    if (val.trim() === "") {
        alert("veuillez répondre avant de valider !");
    }
    else if(val === phrase){
        alert("Bien joué !");
    }
    else{
        alert("Ce n'est pas la bonne réponse, cherchez encore !");
    }
}