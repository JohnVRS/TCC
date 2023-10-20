<!-- Inclua a biblioteca do Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    // Defina as variáveis PHP
    var valorReceita = <?php echo $valorReceita; ?>;
    var valorDespesa = <?php echo $valorDespesa; ?>;
    var totalSomaValores = valorReceita + valorDespesa;

    // Crie um array de dados
    var data = google.visualization.arrayToDataTable([
      ['Categoria', 'Valor'],
      ['Receita', valorReceita],
      ['Despesa', valorDespesa]
    ]);

    var options = {
      pieHole: 0.6,
      pieSliceText: 'none',
      legend: 'none',
      backgroundColor: {
        fill: '#242323',
        stroke: "none",
      },
      slices: {
        0: { color: 'green' },
        1: { color: 'red' }
      },
      pieSliceBorderColor: 'transparent',
      }
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

    // Calcule as porcentagens
    var percentReceita = (valorReceita / totalSomaValores) * 100;
    var percentDespesa = (valorDespesa / totalSomaValores) * 100;

    // Adicione os rótulos de porcentagem ao gráfico
    //var percentReceitaLabel = 'Receita: ' + percentReceita.toFixed(2) + '%';
    //var percentDespesaLabel = 'Despesa: ' + percentDespesa.toFixed(2) + '%';

    chart.draw(data, options);
    }
</script>