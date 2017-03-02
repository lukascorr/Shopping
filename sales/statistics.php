<?php if (isset($_SESSION['id'])) {

$mes=$link->query("SELECT fecha FROM ");?>

<div class="content-wrapper">
     
  <section class="content">
        
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Estadísticas</h3>

            <div class="box-tools pull-right box-title">
              <a href="index.php?id=sales/statistics.php"><button class="btn btn-primary" style='margin-top:-6px; padding: 3px 10px;'>Ventas</button></a>
              <a href="index.php?id=sales/statistics.php&graph"><button class="btn btn-primary" style='margin-top:-6px; padding: 3px 10px;'>Productos</button></a>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>       
            </div>
          </div>
          <div class="box-body">
            <div class="row">
	           	<div class="col-md-12">
              <br>

              <script src="static/js/highcharts.js"></script>
              <script src="static/js/exporting.js"></script>
              <script src="static/js/highcharts-3d.js"></script>
              <style type="text/css">
              ${demo.css}
              </style>
              <?php 

              if (isset($_GET['graph'])) {?>
              <script type="text/javascript">
                $(function () {
              $('#container').highcharts({
               chart: {
               type: 'pie',
               options3d: {
               enabled: true,
               alpha: 45,
               beta: 0
              }
            },
            title: {
              text: 'Productos más vendidos por mes'
            },
            tooltip: {
              pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
              pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
          },
          series: [{
            type: 'pie',
            name: 'Porcentaje',
            data: [
                ['Notebook Mac',   45.0],
                ['Botines Nike',       26.8],
                {
                    name: 'Cocina',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },
                ['Remera',    8.5],
                ['',     6.2],
                ['Others',   0.7]
              ]
            }]
          });
        });
        </script>
        <?php }

        else {?>
          <script type="text/javascript">
          $(function () {
          $('#container').highcharts({
            title: {
            text: 'Grafico de Ingresos',
            x: -20 //center
            },
          subtitle: {
            text: 'Total de ingresos por mes',
            x: -20
          },
          xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
          },
          yAxis: {
            title: {
                text: 'Ingresos ($)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
          },
          tooltip: {
            valueSuffix: '$'
          },
          legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
          },
       // if (fecha<>12) {
         // if (fecha=1) {}
        //} si la fecha(mes) es diferente a diciembre(12) y la fecha es igual a enero rehaga el gafico

          series: [{
            name: '2016',
            data: [0, 0, 0, 0, 0, 0, 0, 0, 3000, 20000,3100 ,0]
          },]
        });
      });
      </script>
    <?php } ?>

      <div id="container" style="height: 400px"></div>


	           	</div>
            </div>               
  		  </div>
       	</div>
      </div>
    </div>
  </section>
</div>
<?php } else{ echo '<meta http-equiv="refresh" content="0; url=./">'; } ?>
