function nuovoMembroStaff() {
    const nomeInput = document.getElementById("nome");
    const cognomeInput = document.getElementById("cognome");
    const usernameInput = document.getElementById("username");
    const staffTotale = document.getElementById("staff");
  
    const nuovoStaff = document.createElement("div");
    nuovoStaff.classList.add("nome");
  
    const nuovoStaffNome = document.createElement("p");
    nuovoStaffNome.textContent = nomeInput.value;

    const nuovoStaffCognome = document.createElement("div");
    nuovoStaffCognome.classList.add("cognome");
  
    const nuovoStaffUsername = document.createElement("div");
    nuovoStaffUsername.classList.add("cognome");
    nuovoStaffUsername.innerHTML = "<p>" + usernameInput.value + "</p>";
  
    nuovoStaff.appendChild(nuovoStaffUsername);
  
    staffTotale.appendChild(nuovoStaff);
  
    nomeInput.value = "";
    cognomeInput.value = "";
  }

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