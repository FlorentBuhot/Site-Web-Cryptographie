let prenom =["Loris","Maël","William","Léopold","Florent","Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",  "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','pique','casse','vole','contemple','attrape','distribue','aime'];
let determinant = ['des','les','ses','ces'];
let adjectif = ['jolis','magnifiques','gros','petit'];
noms = ['stylos','feutres','effaceurs','rapporteurs','ordinateurs','claviers','sacs','bureau'];
let liaison = ['et','plus','avec','après']

let alphabet = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z']

function chaineAléatoire(){
    let tmp = '';
    for (let index = 0; index < 6; index++) {
        if(Math.random()<0.5){
            tmp = tmp + alphabet[Math.floor(Math.random()*alphabet.length)]
        }
        else{
            tmp = tmp + Math.floor(Math.random()*10);
        }
    }
    return tmp;
}

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
    y = Math.floor(Math.random()*adjectif.length);
    while(a == y){
        y = Math.floor(Math.random()*adjectif.length);
    }
    phrase.push(adjectif[y]);
    y = Math.floor(Math.random()*noms.length);
    while (y == b) {
        y = Math.floor(Math.random()*noms.length);
    }
    phrase.push(noms[y]);
    return phrase;
}

function phrase8carc(){
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random()*prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random()*verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    phrase.push(adjectif[Math.floor(Math.random()*adjectif.length)]);
    b = Math.floor(Math.random()*noms.length);
    phrase.push(noms[b]);
    phrase.push(liaison[Math.floor(Math.random()*liaison.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    y = Math.floor(Math.random()*noms.length);
    while (y == b) {
        y = Math.floor(Math.random()*noms.length);
    }
    phrase.push(noms[y]);
    return phrase;
}

function phrase7carc(){
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random()*prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random()*verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    b = Math.floor(Math.random()*noms.length);
    phrase.push(noms[b]);
    phrase.push(liaison[Math.floor(Math.random()*liaison.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    y = Math.floor(Math.random()*noms.length);
    while (y == b) {
        y = Math.floor(Math.random()*noms.length);
    }
    phrase.push(noms[y]);
    return phrase;
}

function phrase5carc(){
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random()*prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random()*verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    phrase.push(adjectif[Math.floor(Math.random()*adjectif.length)]);
    phrase.push(noms[Math.floor(Math.random()*noms.length)]);
    return phrase;
}

function phrase4carc(){
    phrase = [];
    phrase.push(prenom[Math.floor(Math.random()*prenom.length)]);
    phrase.push(verbe[Math.floor(Math.random()*verbe.length)]);
    phrase.push(determinant[Math.floor(Math.random()*determinant.length)]);
    phrase.push(noms[Math.floor(Math.random()*noms.length)]);
    return phrase;
}

function melangeArray(inputArray){
    inputArray.sort(()=> Math.random() - 0.5);
}


function phraseFin(inputArray){
    phraseFinal = '';
    inputArray.forEach(element => {
        phraseFinal += element + ' ';
    });
    return phraseFinal;
}

String.prototype.hashCode = function() {
    var hash = 0;
    if (this.length == 0) {
        return hash.toString();
    }
    for (var i = 0; i < this.length; i++) {
        var char = this.charCodeAt(i);
        hash = ((hash<<5)-hash)+char;
        hash = hash & hash;
    }
    return hash.toString();
}

function chiffrage(phrase){
    phraseChiffrée = '';
    phrase.forEach(element => {
        truc = element.hashCode();
        phraseChiffrée += truc + ' '; 
    });
    return phraseChiffrée;
}

phrase1 = phrase9carc();
phrase2 = phrase8carc();
phrase3 = phrase7carc();
phrase4 = phrase5carc();
phrase5 = phrase4carc();
phrase1chiffre = chiffrage(phrase1);
phrase2chiffre = chiffrage(phrase2);
phrase3chiffre = chiffrage(phrase3);
phrase4chiffre = chiffrage(phrase4);
phrase5chiffre = chiffrage(phrase5);

phrase1 = phraseFin(phrase1);
phrase2 = phraseFin(phrase2);
phrase3 = phraseFin(phrase3);
phrase4 = phraseFin(phrase4);
phrase5 = phraseFin(phrase5);

let listePhrase = [phrase1,phrase2,phrase3,phrase4,phrase5];
let listePhraseChiffre9 = [phrase1chiffre,chiffrage(phrase9carc()),chiffrage(phrase9carc())];
let listePhraseChiffre8 = [phrase2chiffre,chiffrage(phrase8carc()),chiffrage(phrase8carc())];
let listePhraseChiffre7 = [phrase3chiffre,chiffrage(phrase7carc()),chiffrage(phrase7carc())];
let listePhraseChiffre5 = [phrase4chiffre,chiffrage(phrase5carc()),chiffrage(phrase5carc())];
let listePhraseChiffre4 = [phrase5chiffre,chiffrage(phrase4carc()),chiffrage(phrase4carc())];

melangeArray(listePhrase);
melangeArray(listePhraseChiffre9);
melangeArray(listePhraseChiffre8);
melangeArray(listePhraseChiffre7);
melangeArray(listePhraseChiffre5);
melangeArray(listePhraseChiffre4);

let listePhraseChiffre = listePhraseChiffre9.concat(listePhraseChiffre8).concat(listePhraseChiffre7)
                         .concat(listePhraseChiffre5).concat(listePhraseChiffre4);

document.getElementById("soit").innerHTML=('Soit les quatre phrase codé suivante');
document.getElementById("phrasePre").innerHTML=('Phrase 1 : '+ listePhraseChiffre[0]);
document.getElementById("phraseSec").innerHTML=('Phrase 2 : '+ listePhraseChiffre[1]);
document.getElementById("phraseTrois").innerHTML=('Phrase 3 : '+ listePhraseChiffre[2]);
document.getElementById("phraseQuatre").innerHTML=('Phrase 4 : '+ listePhraseChiffre[3]);
document.getElementById("phraseCinq").innerHTML=('Phrase 5 : '+ listePhraseChiffre[4]);
document.getElementById("phraseSix").innerHTML=('Phrase 6 : '+ listePhraseChiffre[5]);
document.getElementById("phraseSept").innerHTML=('Phrase 7 : '+ listePhraseChiffre[6]);
document.getElementById("phraseHuit").innerHTML=('Phrase 8 : '+ listePhraseChiffre[7]);
document.getElementById("phraseNeuf").innerHTML=('Phrase 9 : '+ listePhraseChiffre[8]);
document.getElementById("phraseDix").innerHTML=('Phrase 10 : '+ listePhraseChiffre[9]);
document.getElementById("phraseOnze").innerHTML=('Phrase 11 : '+ listePhraseChiffre[10]);
document.getElementById("phraseDouze").innerHTML=('Phrase 12 : '+ listePhraseChiffre[11]);
document.getElementById("phraseTreize").innerHTML=('Phrase 13 : '+ listePhraseChiffre[12]);
document.getElementById("phraseQuatorze").innerHTML=('Phrase 14 : '+ listePhraseChiffre[13]);
document.getElementById("phraseQuinze").innerHTML=('Phrase 15 : '+ listePhraseChiffre[14]);

document.getElementById("phrase1Clair").innerHTML=('1 : '+listePhrase[0]);
document.getElementById("phrase2Clair").innerHTML=('2 : '+listePhrase[1]);
document.getElementById("phrase3Clair").innerHTML=('3 : '+listePhrase[2]);
document.getElementById("phrase4Clair").innerHTML=('4 : '+listePhrase[3]);
document.getElementById("phrase5Clair").innerHTML=('5 : '+listePhrase[4]);


let index1 = listePhraseChiffre.findIndex((element)=>element == phrase1chiffre);
let index2 = listePhraseChiffre.findIndex((element)=>element == phrase2chiffre);
let index3 = listePhraseChiffre.findIndex((element)=>element == phrase3chiffre);
let index4 = listePhraseChiffre.findIndex((element)=>element == phrase4chiffre);
let index5 = listePhraseChiffre.findIndex((element)=>element == phrase5chiffre);

let indexPhras1 = "phrase"+(index1+1);
console.log(indexPhras1);
let indexPhras2 = "phrase"+(index2+1);
console.log(indexPhras2);
let indexPhras3 = "phrase"+(index3+1);
console.log(indexPhras3);
let indexPhras4 = "phrase"+(index4+1);
console.log(indexPhras4);
let indexPhras5 = "phrase"+(index5+1);
console.log(indexPhras5);

let listePhraseIndex = ['phrase1','phrase2','phrase3','phrase4','phrase5',
                   'phrase6','phrase7','phrase8','phrase9','phrase10',
                   'phrase11','phrase12','phrase13','phrase14','phrase15'];
listePhraseIndex.splice(listePhraseIndex.findIndex((element)=>element == indexPhras1),1);
listePhraseIndex.splice(listePhraseIndex.findIndex((element)=>element == indexPhras2),1);
listePhraseIndex.splice(listePhraseIndex.findIndex((element)=>element == indexPhras3),1);
listePhraseIndex.splice(listePhraseIndex.findIndex((element)=>element == indexPhras4),1);
listePhraseIndex.splice(listePhraseIndex.findIndex((element)=>element == indexPhras5),1);

function controle(form){
    if(document.getElementById(indexPhras1).checked == true &&
       document.getElementById(indexPhras2).checked == true &&
       document.getElementById(indexPhras3).checked == true &&
       document.getElementById(indexPhras4).checked == true &&
       document.getElementById(indexPhras5).checked == true){
           if(document.getElementById(listePhraseIndex[0]).checked == true ||
              document.getElementById(listePhraseIndex[1]).checked == true ||
              document.getElementById(listePhraseIndex[2]).checked == true ||
              document.getElementById(listePhraseIndex[3]).checked == true ||
              document.getElementById(listePhraseIndex[4]).checked == true ||
              document.getElementById(listePhraseIndex[5]).checked == true ||
              document.getElementById(listePhraseIndex[6]).checked == true ||
              document.getElementById(listePhraseIndex[7]).checked == true ||
              document.getElementById(listePhraseIndex[8]).checked == true ||
              document.getElementById(listePhraseIndex[9]).checked == true){
                alert("Essaie encore");
           }
           else{
            alert("Bien joué !!");
           } 
    }
    else{
        alert("Essaie encore")
    }
}