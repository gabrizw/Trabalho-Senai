<?php
    $gen = $_SESSION['generos'];
    $contagens = array_count_values($gen);
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Masculino', <?php echo isset($contagens["Masculino"])?$contagens["Masculino"]:0 ?>],
          ['Feminino', <?php echo isset($contagens["Feminino"])?$contagens["Feminino"]:0 ?>],
          ['Outro', <?php echo isset($contagens["Outro"])?$contagens["Outro"]:0 ?>]
        ]);

       
        var options = {
            'width': 425,
            'height': 325,
            slices: {
                0: { color: '#1abc9c' },
                1: { color: '#9b59b6' },
                2: { color: '#bdc3c7' }
            },
            backgroundColor: 'transparent',
            titleTextStyle: {
                color: '#fff'
            },
            legend: {
                textStyle: {
                    color: '#fff'
                }
            }
          };

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    
    </script>
  </head>

  <body>
    <div id="chart_div"></div>
  </body>
</html>
