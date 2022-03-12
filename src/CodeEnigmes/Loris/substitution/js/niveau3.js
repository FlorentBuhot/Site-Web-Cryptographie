let prenom =["Alice", "Bob", "Carole", "David", "Eve", "Fabien", "Gaspard", "Hector", "Isaac", "Justin", "Kevin", "Louis", "Mallory",  "Nestor", "Oscar","Peggy", "Quentin", "Roger", "Susie", "Trudy", "Ulysse", "Victor", "Walter", "Xavier", "Yvan", "Ziad"];
let verbe = ['prend','mange','casse','vole','contemple','attrape','distribue'];
let noms = ['stylos','feutres','pommes','craies','gommes','effaceurs','rapporteur'];

let prenomrdn = prenom[Math.floor(Math.random()*prenom.length)]
let verberdn = verbe[Math.floor(Math.random()*verbe.length)]
let nomsrdn = noms[Math.floor(Math.random()*noms.length)]
let date = (Math.floor(Math.random()*27)+1) + "/" + (Math.floor(Math.random()*12)+1) +"/" + (Math.floor(Math.random()*6)+2016)
let le = "Le ";

let alphabet = [];
let alphabetMod =[];

for(let j =0; j<26;j++){
	alphabet[j] = String.fromCharCode(97+j)
}

let rdn;
let phraseV = prenomrdn + " " + verberdn + " des " + nomsrdn;

for(let k=0; k<26;k++){
	rdn = Math.floor(Math.random()*alphabet.length);
	alphabetMod[k] = alphabet[rdn];
	alphabet.splice(rdn,1)
}


phraseC = "A qui de droit/ Nous savons depuis peu qui est la raison de ces comportements bizarres/c'est certain que nous pouvons le dire, clef secrete est :/" + phraseV + "//post-scriptum : Voyez ce koala fou qui mange des journaux et des photos dans un bungalow.  "
msgC = subcomplexe(phraseC);

document.getElementById("dateNC").innerHTML = le + date; 
document.getElementById("dateC").innerHTML = subcomplexe(le,rdn) + " "+ date;
document.getElementById("msgC").innerHTML = msgC;

console.log(phraseC);

function subcomplexe(a){ 
	var nouvMes = "";
	for(let i=0;i<a.length;i++){
		nouv=a.charCodeAt(i);
		if(a[i]==" " || a[i] == "," || a[i] == "." || a[i] == ":" || a[i] == "'" || a[i] == "-" ){
			nouvMes = nouvMes + a[i];
		}
		else if(a[i] == "/"){
			nouvMes = nouvMes + "<br />"
		}
		else{
			nouvMes= nouvMes + alphabetMod[nouv-97];
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
