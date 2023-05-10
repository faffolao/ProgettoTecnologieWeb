function countClicks(id) {
    var count = document.getElementById("count" + id);
    var clicks = parseInt(count.innerHTML) + 1;
    count.innerHTML = clicks;
}

function search() {
  var input = document.getElementById("search-bar");
  var filter = input.value.toUpperCase();
  var elements = document.getElementsByClassName("user");


  for (var i = 0; i < elements.length; i++) {
    var text = elements[i].textContent || elements[i].innerText;
    if (text.toUpperCase().indexOf(filter) > -1) {
      elements[i].style.display = "";
    } else {
      elements[i].style.display = "none";
    }
  }
}
