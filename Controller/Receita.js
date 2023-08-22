
    const botaoDespesa = document.getElementById("botaoDespesa");
    const botaoReceita = document.getElementById("botaoReceita");
    const modalDesp = document.getElementById("modalDesp");
    const modalRece = document.getElementById("modalRece");
    const btnClose_Desp = document.getElementById("btnClose_Desp");
    const btnClose_Rece = document.getElementById("btnClose_Rece");
    const saldoGeralP = document.getElementById("saldo-Global");
    const valorDespInput = document.getElementById("valorDesp");
    const valorReceInput = document.getElementById("valorRece");
    const btnSalvar = document.getElementById("btnSalvar");
  
    let saldoGeral = 0;
  
    botaoDespesa.addEventListener("click", function() {
      modalDesp.showModal();
    });
  
    botaoReceita.addEventListener("click", function() {
      modalRece.showModal();
    });
  
    btnClose_Desp.addEventListener("click", function() {
      modalDesp.close();
    });
  
    btnClose_Rece.addEventListener("click", function() {
      modalRece.close();
    });
  
    
    btnSalvar.addEventListener("click", function() {
        
      const novaReceita = parseFloat(valorReceInput.value);
      console.log(novaReceita)
      if (!isNaN(novaReceita)) {
        saldoGeral += novaReceita;
        saldoGeralP.textContent = `R$ ${saldoGeral.toFixed(2)}`;
        valorReceInput.value = "";
        modalRece.close();
      }
    });
  
  