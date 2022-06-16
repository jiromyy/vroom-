// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the cancel button
var cbtn = document.getElementById("cancelBtn");

// Get the error message
var err = document.getElementById("err");

var viewPSA = document.getElementById('viewPSA');
var viewID = document.getElementById('viewID');
var idmodal = document.getElementById('idmodal');
var PSAmodal = document.getElementById('PSAmodal');

viewPSA.onclick = function() {
  PSAmodal.style.display = "block";
}

viewID.onclick = function() {
  idmodal.style.display = "block";
}

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == idmodal || event.target == PSAmodal) {
    idmodal.style.display = "none";
    PSAmodal.style.display = "none";
  }
}


// When the user clicks cancel, close the modal
cbtn.onclick = function() {
  modal.style.display = "none";
  err.style.display = "none";
}



