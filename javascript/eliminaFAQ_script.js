// Aggiungi un listener click su tutti i bottoni "Elimina"
const deleteButtons = document.querySelectorAll('.delete-btn');

// deleteButtons.forEach(button => {
// 	button.addEventListener('click', function() {
// 		// Elimina la riga corrispondente
// 		const row = button.parentNode.parentNode;
// 		row.parentNode.removeChild(row);
// 	});
// });

deleteButtons.forEach(button => {
	button.addEventListener('click', function() {
		// Elimina la riga corrispondente
		if (confirm("Vuoi davvero eliminare questa domanda?")){
			const row = button.parentNode.parentNode;
			row.parentNode.removeChild(row)}
		else {
			return true
		}
	});
});