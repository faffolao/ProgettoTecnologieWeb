// Aggiungi un listener click su tutti i bottoni "Elimina"
const updateButtons = document.querySelectorAll('.update-btn');

updateButtons.forEach(button => {
    button.addEventListener('click', function() {
        var stringa = document.getElementById("tabella").rows[1].cells[0];
        var nome = prompt("Inserisci il nome dell'azienda:");
        // Modifica la riga corrispondente
        stringa.innerHTML = nome
    });
});