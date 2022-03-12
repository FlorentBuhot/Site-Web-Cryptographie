var a = Math.floor(Math.random()*10)-5;
var b = Math.floor(Math.random()*10)-5;
var c = Math.floor(Math.random()*10)-5;
var s = Math.floor(Math.random()*10)-5;
var x1 = Math.floor(Math.random()*10)-5;
var x2 = Math.floor(Math.random()*10)-5;
var x3 = Math.floor(Math.random()*10)-5;
var x4 = Math.floor(Math.random()*10)-5;

while( x1 == 0) {
	x1 = Math.floor(Math.random()*10)-5;
}
while( x2 == 0 || x2==x1) {
	x2 = Math.floor(Math.random()*10)-5;
}
while( x3 == 0 || x3==x2 || x3==x1) {
	x2 = Math.floor(Math.random()*10)-5;
}

while( x4 == 0 || x4 == x3 || x4==x2 || x4==x1){
	x2 = Math.floor(Math.random()*10)-5;
}


let y1 = a*(x1*x1*x1)+b*(x1*x1) + c*x1 + s;
let y2 = a*(x2*x2*x2)+b*(x2*x2) + c*x2 + s;
let y3 = a*(x3*x3*x3)+b*(x3*x3) + c*x3 + s;
let y4 = a*(x4*x4*x4)+b*(x4*x4) + c*x4 + s;

let Alice = "<i>A=(" + x1 + "," + y1 +")</i>";
let Bob = "<i>B=(" + x2 + "," + y2 +")</i>";
let Carol = "<i>C=(" + x3 + "," + y3 +")</i>";
let David = "<i>D=(" + x4 + "," + y4 +")</i>"

document.getElementById("A").innerHTML=Alice;
document.getElementById("B").innerHTML=Bob;
document.getElementById("C").innerHTML=Carol;
document.getElementById("D").innerHTML=David;

console.log(a);
console.log(b);
console.log(c);
console.log(s);

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
