function aggiungiDomanda() {
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
}