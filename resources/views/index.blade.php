@extends('adminlte')

@section('content')
  
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Pengecekan Suhu</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Suhu dan pH</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-sm-6">
            <a href="/export_excel" class="btn btn-success my-3" target="_blank">
          Export to Excel
          </a>
              <table class="table table-bordered">
                  <thead align="center">                  
                     <tr>
                        <th>Kolam</th>
                        <th>Suhu (Celcius)</th>
                        <th >pH</th>
                     </tr>
                  </thead>
                  <tbody align="center">
                  @foreach($tabel as $t)
                     <tr>
                        <td>{{ $t->kolam}}</td>
                        <td>{{ $t->suhu}}</td>
                        <td>{{ $t->ph}}</td>
                     </tr>
                  @endforeach
                  </tbody>
                </table>
            </div>
            <div class="col-sm-6">
              <div id="grafik"></div>
            </div>
          </div>
          </div>
          <!-- /.card-body -->
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
   <!-- /.content -->
  
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('grafik', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Perubahan Suhu dan pH'
      },
      xAxis: {
          categories: {!!json_encode($kolam)!!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Angka'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Suhu (Celcius)',
          data: {!!json_encode($suhu)!!}

      }, {
          name: 'pH',
          data: {!!json_encode($ph)!!}

      }]
  });
</script>
@stop