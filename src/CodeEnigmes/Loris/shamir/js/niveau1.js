var a = Math.floor(Math.random()*20)-10;
var s = Math.floor(Math.random()*20)-10;
var x1 = Math.floor(Math.random()*20)-10;
var x2 = Math.floor(Math.random()*20)-10;


console.log(a);
console.log(s);

while(a == 0){
	a = Math.floor(Math.random()*20)-10;
}

while( x1 == 0) {
	x1 = Math.floor(Math.random()*20)-10;
}
while( x2 == 0 || x2==x1) {
	x2 = Math.floor(Math.random()*20)-10;
}


let y1 = a*x1+s;
let y2 = a*x2+s;

let Alice = "<i>A=(" + x1 + "," + y1 +")</i>";
let Bob = "<i>B=(" + x2 + "," + y2 +")</i>";
document.getElementById("A").innerHTML=Alice;
document.getElementById("B").innerHTML=Bob;


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
}
