var onglets = document.getElementById("onglets");
var contenus = document.getElementById("contenus");

var ddOnglet = onglets.getElementsByTagName("dd");
var ddContenu = contenus.getElementsByTagName("dd");

ddOnglet[0].className = "actif";
ddContenu[0].className = "actif";

for (var i = 0; i < ddOnglet.length; i++){
	ddOnglet[i].num = i;

    ddOnglet[i].addEventListener("click", function(){
    
		for (var j = 0; j < ddOnglet.length; j++){
			ddOnglet[j].className="";
			ddContenu[j].className="";
		}

		ddOnglet[this.num].className="actif";
		ddContenu[this.num].className="actif";
	});
}