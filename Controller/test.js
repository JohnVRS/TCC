document.addEventListener("DOMContentLoaded", function() {
    const botaoReceita = document.getElementById("botaoReceita");
    const saldoP = document.getElementById("saldo");
  
    let saldoAtual = 0;
  
    // Aba pop-up
    const popupContainer = document.createElement("div");
    popupContainer.className = "popup-container";
  
    const popupContent = `
      <h2>Adicionar Receita</h2>
      <input type="text" id="descricaoReceita" placeholder="Descrição">
      <input type="date" id="dataReceita">
      <input type="number" id="valorReceita" placeholder="Valor da receita">
      <button id="adicionarReceita">Adicionar</button>
      <button id="fecharPopup">Fechar</button>
    `;
    popupContainer.innerHTML = popupContent;
  
    const abrirPopup = () => {
      popupContainer.style.display = "block";
    };
  
    const fecharPopup = () => {
      popupContainer.style.display = "none";
    };
  
    botaoReceita.addEventListener("click", function() {
      abrirPopup();
    });
  
    document.body.appendChild(popupContainer);
  
    document.getElementById("fecharPopup").addEventListener("click", fecharPopup);
  
    document.getElementById("adicionarReceita").addEventListener("click", function() {
      const descricaoReceita = document.getElementById("descricaoReceita").value;
      const dataReceita = document.getElementById("dataReceita").value;
      const valorReceita = parseFloat(document.getElementById("valorReceita").value);
  
      if (!isNaN(valorReceita)) {
        saldoAtual += valorReceita;
        saldoP.textContent = `Saldo: R$ ${saldoAtual.toFixed(2)}`;
        fecharPopup();
      }
    });
  });
  