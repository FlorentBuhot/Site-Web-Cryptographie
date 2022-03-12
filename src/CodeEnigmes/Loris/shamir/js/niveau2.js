var a = Math.floor(Math.random()*20)-10;
var b = Math.floor(Math.random()*20)-10;
var s = Math.floor(Math.random()*20)-10;
var x1 = Math.floor(Math.random()*20)-10;
var x2 = Math.floor(Math.random()*20)-10;
var x3 = Math.floor(Math.random()*20)-10;


console.log(a);
console.log(b);
console.log(s);

while( x1 == 0) {
	x1 = Math.floor(Math.random()*20)-10;
}
while( x2 == 0 || x2==x1) {
	x2 = Math.floor(Math.random()*20)-10;
}
while( x3 == 0 || x3==x1 || x3==x2) {
	x3 = Math.floor(Math.random()*20)-10;
}

let y1 = a*(x1*x1)+b*x1 +s;
let y2 = a*(x2*x2)+b*x2+s;
let y3 = a*(x3*x3)+b*x3+s;

let Ariel = "<i>A=(" + x1 + "," + y1 +")</i>";
let Bobby = "<i>B=(" + x2 + "," + y2 +")</i>";
let Carol = "<i>C=(" + x3 + "," + y3 +")</i>";
document.getElementById("A").innerHTML=Ariel;
document.getElementById("B").innerHTML=Bobby;
document.getElementById("C").innerHTML=Carol;

function controle(reponse){
	 test  = document.reponse.box.value;
	if (test.trim() == ""){
		alert("veuillez mettre une reponse avant de valider");
		return;
	}

	if(parseInt(test) == s){
		alert("Bravo vous avez la bonne reponse s= " +s)
	}
	else{
		alert("Dommage cherchez encore")
	}
	//alert("vous avez répondu" + document.reponse.box.value)
}
