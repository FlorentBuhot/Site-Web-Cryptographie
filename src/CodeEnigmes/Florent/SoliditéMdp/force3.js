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
  function getRandomIntInclusive(min, max){
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min +1)) + min;
  }
  
  let annee = getRandomIntInclusive(80,10000);
  let nbCaracTot = 105;
  let vitesseProc = getRandomIntInclusive(27,34)/10;
  let nbCoeur = getRandomIntInclusive(1,8);
  let nbOp;
  let solution;
  
  
  document.getElementById("soit").innerHTML=('Soit : ');
  
  document.getElementById("nbC").innerHTML=('Un nombre de ' + nbCaracTot + ' caractères disponibles pour former un mot de passe.');
  
  document.getElementById("vitesse").innerHTML=('La vitesse du processeur est de ' + vitesseProc + ' GHz et il a '+ nbCoeur + ' coeurs');
  
  nbOp = vitesseProc * 1000000 * nbCoeur;
  solution = Math.ceil(Math.log(nbOp*annee*60*60*24*365)/Math.log(nbCaracTot));
    
  document.getElementById("question").innerHTML=('Saurez-vous calculer le nombre de caractères pour que l\'ordinateur puisse craquer le mot de passe en ' + annee + ' années ?');
  
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
  
  