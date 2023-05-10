const deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach(button => {
	button.addEventListener('click', function() {
		// Elimina la riga corrispondente
		if (confirm("Vuoi davvero eliminare questa offerta?")){
			const row = button.parentNode.parentNode;
			row.parentNode.removeChild(row)}
		else {
			return true
		}
	});
});
