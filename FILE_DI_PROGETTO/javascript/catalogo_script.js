function search() {
  var input = document.getElementById("search-bar");
  var filter = input.value.toUpperCase();
  var elements = document.getElementsByClassName("card");


  for (var i = 0; i < elements.length; i++) {
    var text = elements[i].textContent || elements[i].innerText;
    if (text.toUpperCase().indexOf(filter) > -1) {
      elements[i].style.display = "";
    } else {
      elements[i].style.display = "none";
    }
  }
}

function openPage() {
  window.location.href = "../html/offerta.html";
}