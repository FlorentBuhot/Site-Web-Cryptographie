let cpt=0;
let rdn = 0;


function cacherCode(asciiArt){
	codeSecret = ""
	message =""
	let taille = asciiArt.length;
	cpt=0;
	for (var i = 0; i <=taille -1; i++) { 
		if (asciiArt[i] == "/" ){
			message = message + "<br/>";
		}
		else if(asciiArt[i] == ' '){
			message = message + '&nbsp;';
		}
		else{
			rdn=Math.ceil(Math.random()*1000);
			if(rdn >= 997 && cpt<=9){
				cpt ++;
				message = message + asciiArt[i].toUpperCase()
				codeSecret = codeSecret + asciiArt[i].toUpperCase();
			}
			message = message + asciiArt[i]  
		}
	}
}


let cadenas ="                    abbbbbbbbbbbbbbbaa/";
cadenas +="                abbbbabcdfghiiihgfdcbbbbba/";
cadenas +="              bcbaaabegghhhhiiiijkkmmkgdbbbba/";
cadenas +="            bcbbbbcddegjjjiihhiijjjigimnkfbabb/";
cadenas +="          ccbeggedhiheb          adhiigknkebbba/";
cadenas +="         adcdjliehjea                 dijglnhcaca/";
cadenas +="         dcdlojekha                     elgkohbaca/";
cadenas +="        cebiolflf                        ckfkngbbc/";
cadenas +="        ecemngjg                          flfmldaca/";
cadenas +="       aebhnkfkb                          alhjogbcb/";
cadenas +="       bdbhmigj                            ijhoicbc/";
cadenas +="       acbgkgdc                            hkhoicbc/";
cadenas +="       aaaejfaa                            hkhoicbc/";
cadenas +="        aaeigfh                            hkhnicbc/";
cadenas +="        aabdccc                            hkhnicbc/";
cadenas +="                                           gkhnicbc/";
cadenas +="                                           gkhmhcbc/";
cadenas +="                                           gkimidcd/";
cadenas +="                                           hmlokgge/";
cadenas +="  acbbaaaaaaaaaaaaaaaabbbbcccccccccccbbaaaahmmnljjfbbca/";
cadenas +="  dpmjgfghhgfeddccbbcehjklmnnoooppqpmljhffggghhhhiikmoh/";
cadenas +="  dpnjgfghhgfeddcbbbbdgiklmnoopppqqpnljhggggghhhiijknpi/";
cadenas +="  dpnjgfghigfeddcbbabcfhjlmnnopppqqpnljhgggghhhhiijknpi/";
cadenas +="  epnjgfghigfeedccbabdfiklmnoopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghhgfeedccbbcehjlmnnooppqqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghigfeeddccbdfilmmnoooppqqqpnljhgggghhhiiijlnpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnnoopppqqpnljhggggghhhiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnnoopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnnoopppqqpnljhgggghhhhiijknpi/";
cadenas +="  epnjgfghhgfeeddccbdgjlmnnooopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlnnnoooppqqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnnoopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghigfeeddccbdgjlnnnoooppqqqpnljhgggghhhhiijlnpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnnoopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghigfeeddccbdgjlnnnoooppqqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlnnnoooppqqqpnljhgggghhhhiijknpi/";
cadenas +="  epnjgfghhgfeeddccbdgjlmnnooopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghigfeeddcccdgjlnnnoopppqqqpnljhgggghhhiiijknpi/";
cadenas +="  dpnjgfghhgfeeddccbdgjlmnnooopppqqpnljhgggghhhhiijknpi/";
cadenas +="  dpnjgfghigfeeddccbdgjlnnnoooppqqqpnljhgggghhhiiijknpi/";
cadenas +="bcfpokhghijhgffeeeddehknoopppqqqrrrqonlihhhiiiijjjklopjcb/";
cadenas +="aabeeddddddddddddddddefgggggghhhhhhhggfffeeeeeeeeddeefcaa/";
cadenas +="  acbbbaaaaaaaaaaaa aabbbbbccccccccccbbbbbbbbbbbbbbbbcb/";


let clef="                  cgjlmnopomkifca/";
clef+="             cgjnpqqqqqqqqqqqqqqpmjgc/";
clef+="         afkoqqqqqqqqqqqqqqqqqqqqqqqqpkfa/";
clef+="       cioqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqpjc/";
clef+="     bkqqqqqqqqqqqqqqqkgeddehnqqqqqqqqqqqqqlc/";
clef+="    hpqqqqqqqqqqqqqqnc        gqqqqqqqqqqqqqqia/";
clef+="  alqqqqqqqqqqqqqqqpb          iqqqqqqqqqqqqqqnb/";
clef+=" amqqqqqqqqqqqqqqqqpa          hqqqqqqqqqqqqqqqnb/";
clef+=" jqqqqqqqqqqqqqqqqqqlb        epqqqqqqqqqqqqqqqqm/";
clef+="dqqqqqqqqqqqqqqqqqqqqpkfcbbdglqqqqqqqqqqqqqqqqqqqf/";
clef+="kqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqm/";
clef+="nqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq/";
clef+="oqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq/";
clef+="lqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqp/";
clef+="hqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqql/";
clef+="aoqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqpc/";
clef+=" epqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqf/";
clef+="  doqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqpf/";
clef+="   blqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqnd/";
clef+="     foqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqpha/";
clef+="      agmqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqoha/";
clef+="         cioqqqqqqqqqqqqqqqqqqqqqqqqqqoje/";
clef+="            cgnqqqqqqqqqqqqqqqqqqqqqpf/";
clef+="             epqqqqqqqqqnkqqqqqqqqqqqpg/";
clef+="            hqqqqqqqqqqqehqqqqqqqqqqqqqmb/";
clef+="           iqqqqqqqqqqqqbhqqqqqqqqqqqqqqi/";
clef+="           hpqqqqqqqqqqqbhqqqqqqqqnnmlkha/";
clef+="             aaaaaahqqqqbgqqqqqqqqb/";
clef+="                   iqqqqcfqqqqqqqqb/";
clef+="                   jqqqqcfqqqqqqqqb/";
clef+="                 bkqqqqqdfqqqqqqqqb/";
clef+="               bjpqqqqqqdfqqqqqqqqb/";
clef+="               hoqqqqqqqdeqqqqqqqqb/";
clef+="                agoqqqqqeeqqqqqqqqb/";
clef+="                  agoqqqfeqqqqqqqqb/";
clef+="                   clqqqfdqqqqqqqqb/";
clef+="                 bkqqqqqgdqqqqqqqqb/";
clef+="                jpqqqqqqgdqqqqqqqqc/";
clef+="                pqqqqqqqgcqqqqqqqqd/";
clef+="                pqqqqqqqhcqqqqqqqqd/";
clef+="                bjpqqqqqhcqqqqqqqqd/";
clef+="                  bjpqqqicqqqqqqqqd/";
clef+="                    dpqqibqqqqqqqqd/";
clef+="                   hpqqqiaqqqqqqqqd/";
clef+="                  lqqqqqiaqqqqqqqqd/";
clef+="                  mqqqqqjaqqqqqqqqd/";
clef+="                  mqqqqqjapqqqqqqqd/";
clef+="                  ckqqqqj pqqqqqqqd/";
clef+="                    ckqqj oqqqqqqk/";
clef+="                      clnbmqqqqqj/";
clef+="                        dlpqqqof/";
clef+="                          kqqja/";

while(cpt<9){
	tmp = Math.ceil(Math.random()*100);
	if(tmp<=50){
		cacherCode(clef);
	}
	else{
		cacherCode(cadenas);
	}
}

console.log(codeSecret)

document.getElementById("message").innerHTML= message;