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
  
  
  let nbCarac = getRandomIntInclusive(6,13);
  let nbCaracTot = 105;
  let vitesseProc = getRandomIntInclusive(27,34)/10;
  let nbCoeur = getRandomIntInclusive(1,8);
  let solution;
  
  document.getElementById("soit").innerHTML=('Soit un mot de passe de ' + nbCarac + ' caractères.');
  document.getElementById("sachant").innerHTML=('Sachant que :');
  document.getElementById("nbC").innerHTML=("Il y a  " + nbCaracTot + " caractères disponibles pour former un mot de passe.");
  document.getElementById("vitesse").innerHTML=('La vitesse du processeur est de ' + vitesseProc + ' GHz et il a '+ nbCoeur + ' coeurs');
  
  let nbOp = vitesseProc * 1000000 * nbCoeur;
  let nbOpTrouveMdp = (nbCaracTot)**nbCarac;
  solution = Math.floor((nbOpTrouveMdp/nbOp)/(60*60*24));
  
  if (solution>365){
    solution = Math.floor((nbOpTrouveMdp/nbOp)/(60*60*24*365));
    document.getElementById("question").innerHTML=('En concidérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en années pour un ordinateur actuel de craquer le mot de passe ?');
  }
  else if(solution<1){
    solution = Math.floor((nbOpTrouveMdp/nbOp)/(60*60));
    document.getElementById("question").innerHTML=('En concidérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en heures pour un ordinateur actuel de craquer le mot de passe ?');
  }
  else{
    document.getElementById("question").innerHTML=('En concidérant que le mot de passe est vérifié en une opération, saurez-vous calculer le temps en jour pour un ordinateur actuel de craquer le mot de passe ?');
  }
  
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
  
  
  