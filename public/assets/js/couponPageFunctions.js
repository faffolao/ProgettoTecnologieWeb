function stampaPagina() {
    var x = document.getElementsByClassName("hide");
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    window.print();
    for (var i = 0; i < x.length; i++) {
        x[i].style.display = "inherit";
    }
}

function generaCodice() {
    var lunghezza = 9; // lunghezza del codice
    var caratteri = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; // stringa contenente i caratteri possibili
    var codice = ""; // variabile che conterrà il risultato

    for (var i = 0; i < lunghezza; i++) {
        codice += caratteri.charAt(Math.floor(Math.random() * caratteri.length)); // aggiunge un carattere casuale alla stringa
    }

    return codice;
}

var p = document.getElementById("codice-generato");
p.innerHTML = generaCodice(); // assegna il codice generato all'elemento "p" nella pagina HTML
