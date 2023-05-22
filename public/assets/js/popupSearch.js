var searchAreaOpen = false;
function toggleSearchArea() {
    if (!searchAreaOpen) {
        document.getElementById("catalog-search-form").style.display = "block";
        document.getElementById("section-offerte").style.width = "80%";

        searchAreaOpen = true;
    } else if (searchAreaOpen) {
        document.getElementById("catalog-search-form").style.display = "none";
        document.getElementById("section-offerte").style.width = "100%";

        searchAreaOpen = false;
    }
}
