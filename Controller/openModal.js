var btnDesp = document.getElementById('botaoDespesa');
var btnRece = document.getElementById('botaoReceita');
var modalDesp = document.getElementById('modalDesp');
var btnClose_Desp = document.getElementById('btnClose_Desp');
var btnClole_Rece = document.getElementById('btnClose_Rece');

const salvarR = document.getElementById("salvarR");
let receitasIP = document.getElementById("receitas-Global");
let despesasIP = document.getElementById("despesas-Global");
const saldoGeralP = document.getElementById("saldo-Global");

const valorReceInput = document.getElementById("valorRece");

const salvarD = document.getElementById("salvarD");
const valorDespInput = document.getElementById("valorDesp");


btnDesp.addEventListener("click", function() {
    modalDesp.showModal();
})
btnClose_Desp.addEventListener("click", function() {
    modalDesp.close()
})

btnRece.addEventListener("click", function() {
    modalRece.showModal();
})
btnClose_Rece.addEventListener("click", function() {
    modalRece.close()
})

let saldoGeral = 0;
let receita = 0;
let despesa = 0;

salvarR.addEventListener("click", function() {
        
    console.log("Funciona");
    const novaReceita = parseFloat(valorReceInput.value);
      console.log(novaReceita)
      if (!isNaN(novaReceita)) {
        saldoGeral += novaReceita;
        receita += novaReceita;
        receitasIP.textContent = `R$+ ${receita.toFixed(2)}`;
        saldoGeralP.textContent = `R$ ${saldoGeral.toFixed(2)}`;
        valorReceInput.value = "";
        modalRece.close();
      }

    
});

salvarD.addEventListener("click", function() {
        
    console.log("Funciona");
    const novaDespesa = parseFloat(valorDespInput.value);
      console.log(novaDespesa)
      if (!isNaN(novaDespesa)) {
        saldoGeral -= novaDespesa;
        console.log(despesasIP)
        despesa += novaDespesa;
        despesasIP.textContent = `R$- ${despesa.toFixed(2)}`;
        saldoGeralP.textContent = `R$ ${saldoGeral.toFixed(2)}`;
        valorDespInput.value = "";
        modalDesp.close();
      }

    
});


