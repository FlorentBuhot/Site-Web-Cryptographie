//Fonction qui renvoie un chiffre entre 0 et 1(exclut)
function getRandom() {
    return Math.random();
  }
  
  
  //Fonction qui renvoi un entier entre 0 et le max(exclut)
  function getRandomInt(max) {
    return Math.floor(Math.random() * max);
  }
  
  // On renvoie un entier aléatoire entre une valeur min (incluse)
  // et une valeur max (exclue).
  // Attention : si on utilisait Math.round(), on aurait une distribution
  // non uniforme !
  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }
  
  // On renvoie un entier aléatoire entre une valeur min (incluse)
  // et une valeur max (incluse).
  // Attention : si on utilisait Math.round(), on aurait une distribution
  // non uniforme !
  function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
  }
  
  
  let vitesseProc = getRandomIntInclusive(27,34)/10;
  let nbCoeur = getRandomIntInclusive(1,8);
  let annee = getRandomIntInclusive(10,100);
  let solution;
  
  document.getElementById("soit").innerHTML=('Soit un ordinateur avec un processeur de ' + vitesseProc + ' GHz avec ' + nbCoeur + ' coeurs');
  
  let nbOp = vitesseProc * 1000000 * nbCoeur;
  solution = nbOp * annee;
  
  document.getElementById("question").innerHTML=('Saurez-vous retrouver le nombre de mot de passe calculé par cette ordianteur en '+ annee+ ' ans ?');
  
  console.log(solution);
  function controle(reponse){
    test = document.reponse.box.value;
    if(test.trim() == ""){
      alert("Pas de valeur entré");
      return;
    }
    if(test == solution){
      alert("Bonne réponse");
    }
    else{
      alert("Essaie encore");
    }
  }
  
  
  