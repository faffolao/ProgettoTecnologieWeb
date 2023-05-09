// Aggiungi un listener click su tutti i bottoni "Elimina"
const updateButtons = document.querySelectorAll('.update-btn');

updateButtons.forEach(button => {
    button.addEventListener('click', function() {
        var stringaD = document.getElementById("tabella").rows[1].cells[1];
        var stringaR = document.getElementById("tabella").rows[1].cells[2];
        var newD = prompt("Inserisci la domanda aggiornata:");
        // Modifica la riga corrispondente
        stringaD.innerHTML = newD;
        var newR = prompt("Inserisci la risposta aggiornata");
        stringaR.innerHTML = newR


    });
});