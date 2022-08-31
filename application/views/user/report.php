<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">     

        <div class="card">
          
          <div class="card-body">
            
            <select class="form-control">
                
              <option value="">Pilih Tahun</option>

            </select>

          </div>

        </div>    

        <div class="card">

          <div class="card-body">

            <div id="graph" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto">
              
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
                $laporan = array();

                //array pertanyaan tiap bulan
                foreach ($nama_bulan as $key => $value) {
                  $tot = 0;
                  foreach ($report as $row) {
                    if ($row->bulan == $key) {
                      $tot = (int)$row->total;
                    }
                  }
                  array_push($laporan, $tot);
                }

              ?>

            </div>

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
            text: "<?= $this->session->userdata('nama_user') ?>"
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
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Pengeluaran',
            data: <?= json_encode($laporan) ?>
        }]
    });
  </script>

