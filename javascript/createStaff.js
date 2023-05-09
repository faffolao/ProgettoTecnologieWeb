
function nuovoMembroStaff() {
//seleziono la form
const form = document.querySelector('#nuovoStaff');
//seleziono il button
const submitButton = form.querySelector('button[type="button"]');
//aggiungo un click listener per il submit
submitButton.addEventListener('click', (event) => {
  event.preventDefault(); //prevengo l'invio del form
  const nome = form.querySelector('#nome').value;
  const cognome = form.querySelector('#cognome').value;
  const eta = form.querySelector('#eta').value;
  const genere = form.querySelector('input[name="genere"]:checked').value;
  const email = form.querySelector('#email').value;
  const telefono = form.querySelector('#telefono').value;
  const username = form.querySelector('#username').value;
  const password = form.querySelector('#password').value;
  const livello = form.querySelector('#livello').value;


  //creo un oggetto utente

  const utente = {
    nome,
    cognome,
    eta,
    genere,
    email,
    telefono,
    username,
    password,
    livello
  };
  const listaUtenti = []

  listaUtenti.push(utente);
  alert("Utente inserito correttamente!")
  form.reset();

  //itero su tutti gli utenti e stampo sotto la form quelli di livello 2
  for (let i = 0; i < listaUtenti.length; i++) {
    if (listaUtenti[i].livello == 2 ) {
    const utente = listaUtenti[i].username;
    const output = document.createElement('p');
    output.textContent = utente;
    form.insertAdjacentElement('afterend', output) }
  }
});

}




/*
function nuovoMembroStaff() {
    const nomeInput = document.getElementById("nome");
    const cognomeInput = document.getElementById("cognome");
    const usernameInput = document.getElementById("username");
    const livelloInput = document.getElementById("livello");


    const utentiTotale = document.getElementById("utenti");
  
    const nuovoStaff = document.createElement("div");
    nuovoStaff.classList.add("nome");
  
    const nuovoStaffNome = document.createElement("div");
    nuovoStaffNome.textContent = nomeInput.value;

    const nuovoStaffCognome = document.createElement("div");
    nuovoStaffCognome.classList.add("cognome");

    const nuovoStaffLivello = document.createElement("div");
    nuovoStaffLivello.classList.add("livello");
  
    const nuovoStaffUsername = document.createElement("p");
    nuovoStaffUsername.classList.add("username");
    nuovoStaffUsername.innerHTML = "<p>" + usernameInput.value + "</p>";
  
    nuovoStaff.appendChild(nuovoStaffUsername);
  
    utentiTotale.appendChild(nuovoStaff);
  
    nomeInput.value = "";
    cognomeInput.value = "";
    usernameInput.value = "";
  }
*/




  /*

  
  const domandaInput = document.getElementById("domanda");
  const rispostaInput = document.getElementById("risposta");
  const domandeRisposteAggiuntive = document.getElementById("domande-risposte-aggiuntive");

  const nuovaDomanda = document.createElement("div");
  nuovaDomanda.classList.add("question");

  const nuovaDomandaTitolo = document.createElement("p");
  nuovaDomandaTitolo.textContent = domandaInput.value;

  const nuovaRisposta = document.createElement("div");
  nuovaRisposta.classList.add("answer");
  nuovaRisposta.innerHTML = "<p>" + rispostaInput.value + "</p>";

  nuovaDomanda.appendChild(nuovaDomandaTitolo);
  nuovaDomanda.appendChild(nuovaRisposta);

  domandeRisposteAggiuntive.appendChild(nuovaDomanda);

  domandaInput.value = "";
  rispostaInput.value = "";

  */