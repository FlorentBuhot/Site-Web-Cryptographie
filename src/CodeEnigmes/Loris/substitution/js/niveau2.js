/*
 Dictionnaire des différents ensemble pour faire une pharse cohérente aléatoire sous la forme:
 'Prenom' 'Verbe' des 'noms'
 */
let prenom = ["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory", "Nestor", "Oscar", "Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','mange','casse','vole','contemple','attrape','distribue'];
let noms = ['stylos','feutres','pommes','craies','gommes','effaceurs','rapporteur'];

/*
 choix aléatoire des différentes mots de la phrase secrète parmis les dictionnaire au dessus.
 */

let prenomrdn = prenom[Math.floor(Math.random()*prenom.length)]
let verberdn = verbe[Math.floor(Math.random()*verbe.length)]
let nomsrdn = noms[Math.floor(Math.random()*noms.length)]
let date = (Math.floor(Math.random()*27)+1) + "/" + (Math.floor(Math.random()*12)+1) +"/" + (Math.floor(Math.random()*6)+2016)

/*
 choix aléatoire du décallage des lettres pour le chiffrage du message 
 */
var rdn= Math.floor(Math.random()*23)+2;
let phraseV = prenomrdn + " " + verberdn + " des " + nomsrdn;//création de la phrase secrète avec les choix aléatoire fait au dessus  

/*
 création du message secret qui v'as s'afficher, seul la phrase secrète aléatoire
 les '/' dans la phrase correspondent aux différent saut de ligne qui seront effectuées lors de l'affichage du message
 */
phraseC = "Aux connaisseurs/ Nous savons depuis peu qui est la raison de ces comportements bizarres/c'est certain que nous pouvons le dire, clef secrete est :/" + phraseV + "//post-scriptum : Voyez ce koala fou qui mange des journaux et des photos dans un bungalow.  "

msgC = sub(phraseC, rdn);//chiffrage du message 

document.getElementById("dateNC").innerHTML = 'le' + date; //affichage de la date non chiffré
document.getElementById("dateC").innerHTML = sub('le'.toLowerCase(),rdn) + date;//affichge de la date chiffré
document.getElementById("msgC").innerHTML = msgC;// affichage du message chiffré

console.log(phraseC);//debugage pour les tests

/**
 * @param {String} a
 * @param {Integer} rdn
 

 * fonction de chiffrage de d'un message a avec un décallage rdn 
 * lettre a+rdn =nouvelle lettre;
 * si rdn = 5 a+5 = f
 
 */

function sub(a,rdn){ 
	var nouvMes = "";
	var nouv;
	for(let i=0;i<a.length;i++){
		nouv = a.charCodeAt(i) + rdn;//décalage du code ascii des lettres 
		//if pour faire le tri avec les différent caractère qui ne sont pas des lettres et qui n'est pas '/' qui eux ne doivent pas être modifié;
		if(a[i]==" " || a[i] == "," || a[i] == "." || a[i] == ":" || a[i] == "'" || a[i] == "-" ){
			nouvMes = nouvMes + a[i];
		}
		//if pour tester si le caractère a[i] est '/' pour le transformé en saut de ligne en html
		else if(a[i] == "/"){
			nouvMes = nouvMes + "<br />";
		}
			//modification des la lettres avec le décallage
		else {
			//si le code ascii est trop haut le modifie pour qu'il retombe sur une lettre correct
			if (nouv > 122) {
				nouv = nouv-26; 
			}
			//ajout de la lettre une fois modifiéaux message chiffré
			nouvMes= nouvMes + String.fromCharCode(nouv);
		}
	}
	//renvoie du message une fois chiffré
	return nouvMes;
}

function controle(){
	reponse = document.reponse.box.value;
	reponse.trim();
	if(reponse == ""){
		alert("veuillez entrer une reponse correct");
		return;
	}
	if(reponse.toLowerCase() === phraseV.toLowerCase()){
		alert("bravo vous avez repondu correctement le message secret etait bien : " + phraseV);
	}
	else{
		alert("dommage reessayer de trouver la bonne reponse");
	}
}
