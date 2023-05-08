function login() {
  // Ottieni i valori inseriti dall'utente
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Controlla se l'utente ha inserito l'username e la password corretti
  if (username === "admin" && password === "admin") {
    // Redirect alla pagina desiderata
    window.location.href = "../html/hubAmministratore.html";
  } else if (username === "staff" && password === "staff") {
    // Redirect alla pagina desiderata
    window.location.href = "../html/hubStaff.html";
  } else if (username === "utente" && password === "utente") {
    // Redirect alla pagina desiderata
    window.location.href = "../html/hubUtente.html";
  } else {
    // Visualizza un messaggio di errore
    alert("Username o password errati!");
  }
}