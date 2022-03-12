var element = document.getElementById("niveau");
var level = 1;
var max = 10;
var M, KA, KB;

element.addEventListener('change', function(){
    initialisation();
});

function initialisation(){
    var choix=element.value
    if(choix=="Facile"){
        level = 1;
        max = 10;
    }else if(choix=="Moyen"){
        level = 2;
        max = 100;
    }else{
        level = 3;
        max = 1000;
    }
    M = getRandomInt(max);
    KA = getRandomInt(max);
    KB = getRandomInt(max);
    MA = M + KA;
    MB = MA + KB;
    RA = MB - KA;
    document.getElementById("MA").innerHTML = MA;
    document.getElementById("MB").innerHTML = MB;
    document.getElementById("RA").innerHTML = RA;
}

function getRandomInt(maxi) {
    return Math.floor(Math.random() * maxi);
}

initialisation();

function validation(){
    const Reponse = document.reponse.box.value;

    if(Reponse===this.M){
        alert("Bonne réponse !");
    } else if(Reponse===""){
        alert("Veuillez donner une réponse valide !");
    }
    else{
        alert("Réponse fausse !");
    }
}