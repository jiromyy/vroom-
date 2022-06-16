// Get the modal
var modal = document.getElementById("myModal");

// Get the edit modal and diplay 
var modals = document.getElementById("editModal");
modals.style.display = "block";

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the cancel button
var cbtn = document.getElementById("cancelBtn");

// Get the error message
var err = document.getElementById("err");


// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks cancel, close the modal
cbtn.onclick = function() {
  modals.style.display = "none";
  modal.style.display = "none";
  err.style.display = "none";
}



