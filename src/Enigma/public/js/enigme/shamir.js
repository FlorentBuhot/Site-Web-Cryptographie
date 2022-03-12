//###################################################
//          Initialisation des variables
//###################################################

const select = document.querySelector('#choix');
let s;


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
s = affichage(lvl);

//###################################################
//              Affichage
//###################################################
document.querySelector("#questionRep").innerHTML = "Saurez-vous trouver le message secret ?";

boutonDiff1.addEventListener('click', function () {
    s = affichage(1);
    iconeDiff1.style.color = 'gold';
    iconeDiff2.forEach(element => {
        element.style.color = 'black';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff2.addEventListener('click', function () {
    s = affichage(2);
    iconeDiff1.style.color = 'black';
    iconeDiff2.forEach(element => {
        element.style.color = 'gold';
    });
    iconeDiff3.forEach(element => {
        element.style.color = 'black';
    });
});
boutonDiff3.addEventListener('click', function () {
    s = affichage(3);
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
    let ennonce;

    let a;
    let b;
    let c;
    let s;

    let Alice;
    let Bob;
    let Carol;
    let David;

    let x1;
    let x2;
    let x3;
    let x4;

    let y1;
    let y2;
    let y3;
    let y4;

    a = Math.floor(Math.random() * 20) - 10;
    s = Math.floor(Math.random() * 20) - 10;
    x1 = Math.floor(Math.random() * 20) - 10;
    x2 = Math.floor(Math.random() * 20) - 10;

    document.querySelector("#sendNiveau").value = niveau;
    switch (niveau) {
        case 1:

            while (a === 0) {
                a = Math.floor(Math.random() * 20) - 10;
            }
            while (x1 === 0) {
                x1 = Math.floor(Math.random() * 20) - 10;
            }
            while (x2 === 0 || x2 === x1) {
                x2 = Math.floor(Math.random() * 20) - 10;
            }
            y1 = a * x1 + s;
            y2 = a * x2 + s;
            Alice = "<i>A=(" + x1 + "," + y1 + ")</i>";
            Bob = "<i>B=(" + x2 + "," + y2 + ")</i>";
            Carol = "";
            David = "";
            ennonce = "Soit Alice et Bob qui ont respectivement les points :";
            break;
        case 2:
            b = Math.floor(Math.random() * 20) - 10;
            x3 = Math.floor(Math.random() * 10) - 5;
            while (x1 === 0) {
                x1 = Math.floor(Math.random() * 20) - 10;
            }
            while (x2 === 0 || x2 === x1) {
                x2 = Math.floor(Math.random() * 20) - 10;
            }
            while (x3 === 0 || x3 === x1 || x3 === x2) {
                x3 = Math.floor(Math.random() * 20) - 10;
            }
            y1 = a * (x1 * x1) + b * x1 + s;
            y2 = a * (x2 * x2) + b * x2 + s;
            y3 = a * (x3 * x3) + b * x3 + s;
            Alice = "<i>A=(" + x1 + "," + y1 + ")</i>";
            Bob = "<i>B=(" + x2 + "," + y2 + ")</i>";
            Carol = "<i>C=(" + x3 + "," + y3 + ")</i>";
            David = "";
            ennonce = "Soit Alice, Bob et Carol qui ont respectivement les points :";
            break;
        case 3:
            b = Math.floor(Math.random() * 10) - 5;
            c = Math.floor(Math.random() * 10) - 5;
            x3 = Math.floor(Math.random() * 10) - 5;
            x4 = Math.floor(Math.random() * 10) - 5;
            while (x1 === 0) {
                x1 = Math.floor(Math.random() * 10) - 5;
            }
            while (x2 === 0 || x2 === x1) {
                x2 = Math.floor(Math.random() * 10) - 5;
            }
            while (x3 === 0 || x3 === x2 || x3 === x1) {
                x3 = Math.floor(Math.random() * 10) - 5;
            }
            while (x4 === 0 || x4 === x3 || x4 === x2 || x4 === x1) {
                x4 = Math.floor(Math.random() * 10) - 5;
            }
            y1 = a * (x1 * x1 * x1) + b * (x1 * x1) + c * x1 + s;
            y2 = a * (x2 * x2 * x2) + b * (x2 * x2) + c * x2 + s;
            y3 = a * (x3 * x3 * x3) + b * (x3 * x3) + c * x3 + s;
            y4 = a * (x4 * x4 * x4) + b * (x4 * x4) + c * x4 + s;
            Alice = "<i>A=(" + x1 + "," + y1 + ")</i>";
            Bob = "<i>B=(" + x2 + "," + y2 + ")</i>";
            Carol = "<i>C=(" + x3 + "," + y3 + ")</i>";
            David = "<i>D=(" + x4 + "," + y4 + ")</i>";
            ennonce = "Soit Alice, Bob, Carol et David qui ont respectivement les points :";
            break;
    }
    document.querySelector("#ennonce").innerHTML = ennonce;
    document.querySelector("#A").innerHTML = Alice;
    document.querySelector("#B").innerHTML = Bob;
    document.querySelector("#C").innerHTML = Carol;
    document.querySelector("#D").innerHTML = David;
    return s;
}

//###################################################
//              Validation
//###################################################

function solution() {
    let test = document.reponse.box.value;

    if (test.trim() === "") {
        document.querySelector(".zone_valid").classList.add('active2');
    }
    if (parseInt(test) === s) {
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

