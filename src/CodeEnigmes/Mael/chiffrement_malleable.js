//###################################################
//          Initialisation des variables
//###################################################

const select = document.getElementById('choix');
var a,b,m,c;
var rep;
var min,max
//###################################################
//           Affichage lors du premier 
//             Lancement de la page 
//###################################################  

min=1;
max=10;
affichage(min,max);


//###################################################
//          Fonction qui change les contenue
//               Celon le niveau choisie
//###################################################
select.addEventListener('change', function () {
    var valeur = select.options[select.selectedIndex].value;
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
//              Fonction de test
//###################################################

function test(a,b,m){
    if(isNaN(a) && isNaN(b) && isNaN(m)){
        alert("La valeur n'est pas un nombre");
    }
}

//###################################################
//              Validation
//###################################################

function solution(reponse){
    let val = document.reponse.box.value;

    if(isNaN(val)){
        alert("La valeur rentrer n'est pas un Nombre");
        return trouver;
    }
    if (parseInt(val)==m){
        alert("Vous avez trouver le message !");
        return 0;
    }else{
        alert("Ce n'est pas le bon message ressayer !");
        return trouver;
    }
}

//###################################################
//        Fonction qui permet celon les données
//        rentrer génerer l'enigme du niveau
//        demander
//###################################################

function affichage(niveau){

    if(niveau==1){
        min=1;
        max=10;
    }else if (niveau==2){
        min=1;
        max=100;
    }else if ( niveau == 3 ){
        min=1;
        max=1000;
    }else{
        alert("Erreur dans la séléction de niveau,veuillez recommencer");
    }
    
    a=Math.trunc(Math.random() * (max - min) + min);
    b=Math.trunc(Math.random() * (max - min) + min);
    m=Math.trunc(Math.random() * (max - min) + min);
    c=a+b+m;

    //#######################################
    //      Définir le contenue de la
    //      page html
    //#######################################

    //Nom de l'énigme
    var nomEnigme="Chiffrement malléable";
    //Contenue de l'énigme
    var texte="> "+a+" = c x c\'<br> > "+b+" = c x c\'\'<br>> "+c+" = c x c' x c x c'' x c<br>";
    //Question à laquelle l'utilisateurs doit repondre
    var questionReponse="Quelle est le nombre qui est contenue dans le message ?";


    //################################################
    //              Affichage
    //################################################

    document.getElementById("contenuePage").innerHTML=texte;
    document.getElementById("titre").innerHTML=nomEnigme;
    document.getElementById("questionRep").innerHTML=questionReponse;
}