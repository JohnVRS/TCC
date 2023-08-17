var btnDesp = document.getElementById('botaoDespesa');
var btnRece = document.getElementById('botaoReceita');
var modalDesp = document.getElementById('modalDesp');
var btnClose_Desp = document.getElementById('btnClose_Desp')
var btnClole_Rece = document.getElementById('btnClose_Rece')

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

