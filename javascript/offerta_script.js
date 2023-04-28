// var list = document.getElementById('toggle-list');
//
// list.addEventListener('click', function(event) {
//   var target = event.target;
//
//   if (target.tagName === 'LI') {
//     var current = document.querySelector('#toggle-list li:not(:first-child)');
//
//     if (current) {
//       current.style.display = 'none';
//     }
//
//     var next = target.nextElementSibling;
//
//     if (next) {
//       next.style.display = 'block';
//     }
//   }
// });

const toggles = document.getElementsByClassName("toggle");

for (let i = 0; i < toggles.length; i++) {
  toggles[i].addEventListener("click", function() {
    const subList = this.querySelector(".sub-list");
    subList.classList.toggle("hidden");
  });
 }