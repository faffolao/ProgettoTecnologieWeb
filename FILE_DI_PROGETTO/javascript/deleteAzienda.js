// Aggiungi un listener click su tutti i bottoni "Elimina"
const deleteButtons = document.querySelectorAll('.btn-table-delete');

deleteButtons.forEach(button => {
    button.addEventListener('click', function() {
        // Elimina la riga corrispondente
        if (confirm("Vuoi davvero eliminare questa azienda?")){
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row)}
        else {
            return true
        }
    });
});
