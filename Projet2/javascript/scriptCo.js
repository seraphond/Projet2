function displayCo(){
	var disp = window.getComputedStyle(document.getElementById("co")).display;
  var divCo = document.getElementById("co");
  
	if (disp == "none"){
		divCo.style.display = "block";
	}
	else{
		divCo.style.display = "none";
	}
}

function setupListeners(){
	var co = document.getElementById("interact");
	co.addEventListener("click",displayCo);
}

window.addEventListener("load",setupListeners);
