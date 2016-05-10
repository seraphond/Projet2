function zoom(){
  var mo = document.getElementById("moved");
  if(window.getComputedStyle(mo).display == "none"){
   mo.innerHTML = "<div id='event'>"+ this.innerHTML + "</div>";
   mo.style.display = "inline";
  }
  else{
    mo.style.display = "none";
  }
}


function setupListeners(){
  var ev = document.querySelectorAll('#event');//getElementById("event");
  for(var i =0; i<ev.length; i++){
      ev[i].addEventListener("click",zoom);
  }
  var mo = document.getElementById("moved");
  mo.addEventListener("click",zoom);
}

window.addEventListener("load",setupListeners);