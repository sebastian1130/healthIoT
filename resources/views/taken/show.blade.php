<html>
    <head>
        <meta http-equiv="refresh" content="10">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Fecha', 'Presión Sistólica', 'Presión Diastólica'],
                @foreach($medidas as $medida)
                    ["{{$medida->created_at}}", {{$medida->valorPS}}, {{$medida->valorPD}}],
                @endforeach
            ]);
            var options = {
              title: "{{$sis->nombre}}",
              curveType: 'function',
              legend: { position: 'bottom' }
            };
            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
            chart.draw(data, options);
            var data2 = google.visualization.arrayToDataTable([
              ['Fecha', 'Temperatura'],
                @foreach($medidas as $medida)
                    ["{{$medida->created_at}}", {{$medida->valorT}}],
                @endforeach
            ]);
            var options2 = {
              title: "{{$sis->nombre}}",
              curveType: 'function',
              legend: { position: 'bottom' }
            };
            var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));
            chart2.draw(data2, options2);
          }
          // google.charts.load('current', {'packages':['corechart']});
          // google.charts.setOnLoadCallback(drawChart);
          // function drawChart() {
          //
          // }
        </script>
    </head>
    <body>



<?php $med = $medidas ?>
<div class="contenedor">
  <h2>Sistema <?php echo $sis->id;?>, <?php echo $sis->nombre?></h2>
<hr>
  @if($data)
    <h3>Datos de referencia: </h3>
    <br>
    <h4>Presión arterial: </h4>
    <div class="">
      <p>Sistólica: <?php echo $data->valorPS;?></p>
      <p>Diastólica: <?php echo $data->valorPD;?></p>
    </div>
    <h4>Temperatura corporal: </h4>
    <div class="">
      <p>temperatura promedio: <?php echo $data->valorT;?></p>
    </div>
  @else
    <p>No existen datos de referencia</p>
  @endif
  <br><hr>

  @if($med->count()>0)
    <div class="graficos clearfix">
      <div class="pressure" style="margin: 40px 0 auto 0; margin-bottom: 400px;">
        <h2>Tus datos de presión arterial a través del tiempo</h2>
        <div id="curve_chart" style="width: 70%; height: 50%; float: left;"></div>
        <div class="" style="float: left; width: 22%; padding-left:5px">
          <h4>Medidas anómalas: </h4>
          @foreach($med as $meas)
            <?php if(($meas->valorPS>$data->valorPS+15)||($meas->valorPS<$data->valorPS-15)||($meas->valorPD>$data->valorPD+15)||($meas->valorPD<$data->valorPD-15)){?>
              <p>
                <?php echo $meas->valorPS . " " . $meas->valorPD . " ". $meas->created_at;?>
              </p>
            <?php }?>
          @endforeach
        </div>
      </div>
        <div class="pressure" style="margin: 70px 0 auto 0; margin-bottom: 400px;">
          <h2>Tus datos de Temperatura a través del tiempo</h2>
          <div id="curve_chart2" style="width: 70%; height: 50%; float: left;"></div>
          <div class="" style="float: left; width: 22%; padding-left:5px">
            <h4>Medidas anómalas: </h4>
            @foreach($med as $meas)
              <?php if(($meas->valorT>37.6)||($meas->valorT<36.0)){?>
                <p>
                  <?php echo $meas->valorT . " " . $meas->created_at;?>
                </p>
              <?php } ?>
            @endforeach
          </div>
        </div>
    </div>
  @else
    <h3>Nunca has medido tus signos vitales.</h3>
  @endif


  @if((auth()->user()->rol == 1))
    @if($data)
      <a href="{{  url('/modRef', $sis->id) }}" class="btn btn-primary">Modificar referencia</a>
    @else
      <a href="{{  url('/addRef', $sis->id) }}" class="btn btn-primary">Agregar referencia</a>
    @endif


  @endif



</div>
</body>
</html>
