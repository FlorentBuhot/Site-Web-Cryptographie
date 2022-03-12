let index = 0;
const boutonI = document.querySelector('#btnIndice');

let titre = document.querySelector('#titre');

function notEnoughPoints() {
    let ind = document.querySelector('#base');
    ind.innerHTML = "Vous n'avez pas assez de points pour débloquer un indice !";
}

function attPoints(nivInd, etoiles) {
    let balisePoints = document.querySelector('#points');
    let formPoints = document.querySelector("input[name='points']");
    let points = document.querySelector("input[name='pointsJoueur']");
    let niv = [];
    switch (etoiles) {
        case 1:
            niv = [250, 500, 1000];
            break;
        case 2:
            niv = [375, 750, 1500];
            break;
        case 3:
            niv = [500, 1000, 2000];
            break;
        default:
            break;
    }
    console.log(niv);

    switch (nivInd) {
        case 1:
            if (points.value >= niv[0]) {
                balisePoints.innerHTML = niv[1];
                formPoints.value = niv[0];
                points.value -= niv[0];
                index++;
                sendFormPoints();
                return true;
            } else {
                notEnoughPoints();
                return false;
            }
        case 2:
            if (points.value >= niv[1]) {
                balisePoints.innerHTML = niv[2];
                formPoints.value = niv[1];
                points.value -= niv[1];
                index++;
                sendFormPoints();
                return true;
            } else {
                notEnoughPoints();
                return false;
            }
        case 3:
            if (points.value >= niv[2]) {
                formPoints.value = niv[2];
                points.value -= niv[2];
                index++;
                sendFormPoints();
                return true;
            } else {
                notEnoughPoints();
                return false;
            }
        default:
            return false;
    }
}

function toggle_text() {

    let indices1 = document.querySelector("#id1");
    let indices2 = document.querySelector("#id2");
    let indices3 = document.querySelector("#id3");
    switch (titre.innerHTML) {
        case "Méli-mélo de caractères":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 1)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 1)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 1)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Les énigmes de Jules":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 1)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 1)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 1)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Chiffrement malléable":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 2)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 2)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 2)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Vous avez dit sûr, ...sûr ?":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 2)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 2)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 2)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Un chiffrement presque allemand":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 2)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 2)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 2)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Solidité d'un mot de passe":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 2)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 2)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 2)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Payer en Bitcoin":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 3)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 3)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 3)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        case "Le partage de Shamir":
            if (index === 0) {
                document.querySelector('#base').innerHTML = '';
                if (attPoints(1, 3)) {
                    indices1.style.display = 'inline';
                }
            } else if (index === 1) {
                if (attPoints(2, 3)) {
                    indices2.style.display = 'inline';
                }
            } else if (index === 2) {
                if (attPoints(3, 3)) {
                    indices3.style.display = 'inline';
                }
            } else {
                console.log('ERREUR : la boucle des indices a dépassé le 3ème niveau.');
            }
            break;
        default:
            console.log("ERREUR : l'énigme n'a pas d'indice défini.");
    }

    if (index === 3) {
        boutonI.style.display = "none";
    }
}

