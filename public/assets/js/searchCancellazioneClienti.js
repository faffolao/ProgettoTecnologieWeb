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
