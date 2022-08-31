<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">     

        <div class="card">
          
          <div class="card-body">
            
            <select class="form-control">
                
              <option value="">Pilih Tahun</option>

              <?php foreach ($years as $key) {?>

                  <option value="<?=$key->year;?>"><?=$key->year;?></option>

              <?php } ?>              

            </select>

          </div>

        </div>    

        <div class="card card-primary card-outline">

          <div class="card-body">

            <div id="graph" style="min-height: 500px">
              
              <?php 
                $nama_bulan = array(
                  1 =>'Januari', 
                  2 =>'Februari', 
                  3 =>'Maret', 
                  4 =>'April', 
                  5 =>'Mei', 
                  6 =>'Juni', 
                  7 =>'Juli', 
                  8 =>'Agustus', 
                  9 =>'September', 
                  10 =>'Oktober', 
                  11 =>'November', 
                  12 =>'Desember'
                );

                $totalq = 0;
                $lapOutcome = array();
                $lapIncome = array();

                //array pertanyaan tiap bulan
                foreach ($nama_bulan as $key => $value) {
                  $totOut = 0;
                  $totIn = 0;

                  foreach ($outcome as $row) {
                    if ($row->bulan == $key) {
                      $totOut = (int)$row->total;
                    }
                  }
                  array_push($lapOutcome, $totOut);

                  foreach ($income as $row) {
                    if ($row->bulan == $key) {
                      $totIn = (int)$row->total;
                    }
                  }
                  array_push($lapIncome, $totIn);

                }

              ?>

            </div>

          </div>

        </div>

        <div class="card card-primary card-outline">

          <div class="card-header">

            Detail Laporan
            
          </div>          

          <div class="card-body">
            
            <table id="example2" class="table table-bordered table-striped">
                
              <thead>
                
                <tr>
                    
                  <th>#</th>

                  <th>Tanggal</th>

                  <th>Keterangan</th>

                  <th>Nominal</th>

                </tr>

              </thead>

              <tbody>

                <?php $no=1; foreach ($detail as $key) {?>
                
                  <tr>
                    
                    <td><?=$no++;?></td>

                    <td><?=date('d F Y', strtotime($key->waktu));?></td>

                    <td><?=$key->ket_pengeluaran;?></td>

                    <td><?=rupiah($key->nominal_pengeluaran);?></td>

                  </tr>

                <?php } ?>

              </tbody>

            </table>

          </div>

        </div>

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

  </div>

  <!-- /.content-wrapper -->
  <script src="https://code.highcharts.com/highcharts.js"></script>

  <script src="https://code.highcharts.com/modules/exporting.js"></script>

  <script src="https://code.highcharts.com/modules/export-data.js"></script>

  <script type="text/javascript">

    Highcharts.chart('graph', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Laporan Keuangan'
        },
        subtitle: {
            text: "Pemasukan : <?= rupiah(array_sum($lapIncome))?> | Pengeluaran : <?= rupiah(array_sum($lapOutcome))?>"
        },
        xAxis: {
           categories: [
              'Januari',
              'Februari',
              'Maret',
              'April',
              'Mei',
              'Juni',
              'Juli',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'Desember'
          ],
          crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rupiah',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            },
            series: {
                grouping: true,                  
                groupPadding:0.1,
                pointWidth:10,
                pointPadding: 0.5,
            }
        },
        // legend: {
        //     layout: 'vertical',
        //     align: 'right',
        //     verticalAlign: 'top',
        //     x: -40,
        //     y: 80,
        //     floating: true,
        //     borderWidth: 1,
        //     backgroundColor:
        //         Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        //     shadow: true
        // },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Pemasukan',
            data: <?= json_encode($lapIncome) ?>
        },{
            name: 'Pengeluaran',
            data: <?= json_encode($lapOutcome) ?>,
            color : '#ffa5b0'
        }]
    });
  </script>

