//###################################################
//  Partie de la génération d'une phrase aléatoire 
//###################################################

let prenom =["Loris","Maël","William","Léopold","Florent","Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",  "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','pique','casse','vole','contemple','attrape','distribue','aime'];
let determinant = ['des','les','ses','ces'];
let adjectif = ['jolis','magnifiques','gros','petit'];
let noms = ['stylos','feutres','effaceurs','rapporteurs','ordinateurs','claviers','sacs','bureau'];
let liaison = ['et','plus','avec','après'];

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
    phrase.push(".");
    return phrase;
}

//###################################################
//        Récupération du choix de niveau 
//###################################################

var select = document.getElementById("choix");

//###################################################
//           Affichage lors du premier 
//             Lancement de la page 
//###################################################

var niveau = 1;
var message;
affichage(niveau);

//###################################################
//           Selection du choix du niveau 
//###################################################

select.addEventListener('change', function (){
    var valeur = select.options[select.selectedIndex].value;
    valeur = parseInt(valeur);

    switch (valeur) {
        case 1:
            this.message=affichage(1);
            break;
        case 2:
            this.message=affichage(2);
            break;
        case 3:
            this.message=affichage(3);
            break;
        default:
            console.log('default');
        }
 
});

//###################################################
//              Fonction de l'énigme 
//               et de son affichage
//###################################################

function affichage(niveau){
    var phrase = "A qui de droit, J'ai aussi remarqué que les Allemands utilisent des astuces phonétiques pour rendre la cryptanalyse plus difficile.";
    var s = "Le message secret est :";
    var date = "Le 29 avril 2021 à Washington D.C.";
    var sign = "Elizabeth Smith Friedman.";

    var msgTab = permut(phrase,niveau).split("");
    msgTab.splice(12,0,"<br>");
    var msgR = msgTab.join("");
    
    var dateR = permut(date,niveau);
    
    this.message  = phrase9carc().join(" ");
    var secretR = permut(message,niveau);

    var s2 = permut(s,niveau);
    var sign2 = permut(sign,niveau);
    
    document.getElementById("date").innerHTML = dateR;
    document.getElementById("msg").innerHTML = msgR;
    document.getElementById("secret").innerHTML = s2 + " " + secretR;
    document.getElementById("sign").innerHTML = sign2 + message;

    return this.message;
}

//###################################################
//        fonction de permutation des groupes
//         de lettres selon le niveau choisi
//###################################################

function permut(p,niveau){
    console.log(p);
    if(niveau == 1){
        var tab = p.toString().split("");
    }else{
        var tab = p.toString().replace(/ /g,"").split("");
    }
    
    var result= "";
    var i = 0;
    switch(niveau){
        case 1:
            for(i=0; i<tab.length-2; i+=3){
                a = tab[i];
                b = tab[i+1];
                c = tab[i+2];
                groupe = c+a+b;
                result += groupe;
            }
            break;
        case 2:
            for(i=0; i<tab.length-4; i+=5){
                a = tab[i];
                b = tab[i+1];
                c = tab[i+2];
                d = tab[i+3];
                e = tab[i+4];
                groupe = d+e+c+a+b;
                result += groupe;
            }
            break;
        case 3:
            for(i=0; i<tab.length-6; i+=7){
                a = tab[i];
                b = tab[i+1];
                c = tab[i+2];
                d = tab[i+3];
                e = tab[i+4];
                f = tab[i+5];
                g = tab[i+6];
                groupe = e+d+c+g+a+f+b;
                result += groupe;
            }
            break;

    }
    if(i<tab.length){
        for(i;i<tab.length;i++){
            result += tab[i];
        }
    }
    return result;
}

//###################################################
//      fonction de validation de la réponse
//###################################################

function solution(){
    const Reponse = document.reponse.box.value;

    if(reform(Reponse)===reform(this.message)){
        alert("Bonne réponse !");
    } else if(Reponse === ""){
        alert("Veuillez donner une réponse valide !");
    }
    else{
        alert("Réponse fausse !");
    }
}

//###################################################
//      fonction utiliser pour transposer la 
//      réponse et la solution au meme format
//##################################################

function reform(s){
    return s.normalize('NFD').replace(/[\u0300-\u036f]/g, "").toLowerCase().split(" ").join("");
}