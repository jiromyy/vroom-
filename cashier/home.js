// Get the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("approve");

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal)  {
    modal.style.display = "none";
  }
}




