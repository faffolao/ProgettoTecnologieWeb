function countClicks(id) {
    var count = document.getElementById("count" + id);
    var clicks = parseInt(count.innerHTML) + 1;
    count.innerHTML = clicks;
}

var tot = document.getElementById("total")
function countPromo(id) {
  var count = document.getElementById("countP" + id);
  var clicks = parseInt(count.innerHTML) + 1;
  count.innerHTML = clicks;
  tot.innerHTML = parseInt(tot.innerHTML) + 1;
}

function sumAllCounts() {
 var total = 0;
 for (var i = 1; i <= 3; i++) {
   var count = document.getElementById("countP" + i);
   total += parseInt(count.innerHTML);
 }
 return total;
}

var total = sumAllCounts();
document.getElementById("total").innerHTML = total;

function searchUsers() {
  var input = document.getElementById("search-bar1");
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


function searchCoupons() {
  var input = document.getElementById("search-bar2");
  var filter = input.value.toUpperCase();
  var elements = document.getElementsByClassName("promo");


  for (var i = 0; i < elements.length; i++) {
    var text = elements[i].textContent || elements[i].innerText;
    if (text.toUpperCase().indexOf(filter) > -1) {
      elements[i].style.display = "";
    } else {
      elements[i].style.display = "none";
    }
  }
}