function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }

}


function edt(){

  document.getElementById("button").style.display="none";
  document.getElementById("button2").style.display="block";
  document.getElementById("carte").style.display="none";
  document.getElementById("edt").style.display="block";

}

function plan(){

  document.getElementById("button").style.display="block";
  document.getElementById("button2").style.display="none";
  document.getElementById("carte").style.display="block";
  document.getElementById("edt").style.display="none";

}

function trans(lien){

  window.parent.document.getElementById("detail").src = lien;

  var regex="[U]+[0-9]+";

  var salle = lien.match(regex);

  var etage = salle[0].substr(1,1);

  window.parent.document.getElementById("carte").src = "addon/plan.php?etage="+etage+"&salle="+salle;

  


}
