let prenom =["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",  "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','mange','casse','vole','contemple','attrape','distribue'];
let noms = ['stylos','feutres','pommes','craies','gommes','effaceurs','rapporteurs'];

let prenomrdn = prenom[Math.floor(Math.random()*prenom.length)]
let verberdn = verbe[Math.floor(Math.random()*verbe.length)]
let nomsrdn = noms[Math.floor(Math.random()*noms.length)]
let date = (Math.floor(Math.random()*27)+1) + "/" + (Math.floor(Math.random()*12)+1) +"/" + (Math.floor(Math.random()*6)+2016)

let le = "Le ";

var rdn= 3;
var nouv ;
let phraseV = prenomrdn + " " + verberdn + " des " + nomsrdn;


phraseC = "A qui de droit/ Nous savons depuis peu qui est la raison de ces comportements bizarres/c'est certain que nous pouvons le dire, clef secrete est :/" + phraseV + "//Post-Scriptum : Voyez ce koala fou qui mange des journaux et des photos dans un bungalow.  "

msgC = sub(phraseC,rdn);

document.getElementById("dateNC").innerHTML = le + date; 
document.getElementById("dateC").innerHTML = sub(le.toLowerCase(),rdn) + date;
document.getElementById("msgC").innerHTML = msgC;

console.log(phraseC);

function sub(a,rdn){ 
	var nouvMes = "";
	for (let i = 0; i < a.length; i++) {
		nouv = a.charCodeAt(i) + rdn;
		if (a[i] == " " || a[i] == "," || a[i] == "." || a[i] == ":" || a[i] == "-" || a[i] == "'"){
			nouvMes = nouvMes + a[i];
		}
		else if(a[i] == "/"){
			nouvMes = nouvMes + "<br />"
		}
		else{
			if(nouv>122){
				nouv = nouv-26; 
			}
			nouvMes= nouvMes + String.fromCharCode(nouv);
		}
	}
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
