document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search-bar');
        var searchForm = document.getElementById('search-form');

        searchInput.addEventListener('keydown', function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                searchForm.submit();
            }
        });
    });

// function search() {
//     var input = document.getElementById("search-bar");
//     var filter = input.value.toUpperCase();
//     var elements = document.getElementsByClassName("card");
//
//     for (var i = 0; i < elements.length; i++) {
//         var text = elements[i].textContent || elements[i].innerText;
//         if (text.toUpperCase().indexOf(filter) > -1) {
//             elements[i].style.display = "block";
//         } else {
//             elements[i].style.display = "none";
//         }
//     }
// }

function openPage() {
    window.location.href = "infoAzienda.html";
}
