function search() {
  var input = document.getElementById("search-bar");
  var filter = input.value.toUpperCase();
  var elements = document.getElementsByTagName("p");

  for (var i = 0; i < elements.length; i++) {
    var text = elements[i].textContent || elements[i].innerText;
    if (text.toUpperCase().indexOf(filter) > -1) {
      elements[i].style.display = "";
    } else {
      elements[i].style.display = "none";
    }
  }
}

// const form = document.querySelector("form");
// const input = document.querySelector("input[type='text']");
//
// form.addEventListener("submit", (e) => {
//   e.preventDefault();
//   const searchTerm = input.value.toLowerCase();
//   const paragraphs = document.getElementsByTagName("p");
//
//   Array.from(paragraphs).forEach((p) => {
//     const text = p.innerText.toLowerCase();
//     if (text.includes(searchTerm)) {
//       p.classList.add("highlight");
//     } else {
//       p.classList.remove("highlight");
//     }
//   });
//
//   input.value = "";
// });






