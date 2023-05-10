const listaAziende = [];

function nuovaAzienda() {
    //seleziono la form
    const form = document.querySelector('#nuovaAzienda');
    //seleziono il button
    const submitButton = form.querySelector('button[type="button"]');
    //aggiungo un click listener per il submit
    submitButton.addEventListener('click', (event) => {
      event.preventDefault(); //prevengo l'invio del form
      const nome = form.querySelector('#nome').value;
      const descrizione = form.querySelector('#descrizione').value;
      const ragionesociale = form.querySelector('#ragionesociale').value;
      const tipologia = form.querySelector('#tipologia').value;
      
      //prendo l'immagine in input
      const logo = document.querySelector('img');
      const file = document.querySelector('input[type=file]').files[0];
      const reader = new FileReader();

      reader.addEventListener("load", function () {
        // convert image file to base64 string
        logo.src = reader.result;
       }, false);

      if (file) {
      reader.readAsDataURL(file);
      }

      //verifico che il logo è stato correttamente inserito

    
    
      //creo un oggetto azienda
      const azienda = {
        id: listaAziende.length + 1,
        nome,
        descrizione,
        ragionesociale,
        tipologia,
        logo,
      };
    
      
      alert("Azienda inserita correttamente!");
      form.reset();

      //aggiungo alla lista
      listaAziende.push(azienda);
      console.log("lenght of list: ", listaAziende.length);

      let numero = 0;
      let azienda_ = "";
    
      
      //itero su tutte le aziende e stampo sotto la form
      for (let i = 0; i < listaAziende.length; i++) {
        azienda_ = listaAziende[i].nome;
        numero = listaAziende[i].id;
      }

      const output = document.createElement('p');
        output.textContent = azienda;
        form.insertAdjacentElement('afterend', output);
        output.textContent = numero;
        form.insertAdjacentElement('afterend', output);

        console.log(azienda);
        console.log(numero)
      
      
    
    });
    }