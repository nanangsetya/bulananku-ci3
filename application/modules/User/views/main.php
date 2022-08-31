<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <?= $this->session->flashdata('alert') ?>

        <div class="row">

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-info">

              <div class="inner">

                <h5 class="text-right"><?=rupiah($bulan)?></h5>

                <p>Bulan Ini</p>

              </div>

              <div class="icon">

                <i class="ion ion-bag"></i>

              </div>

            </div>

          </div>

          <div class="col-lg-3 col-6">

            <!-- small box -->

            <div class="small-box bg-warning">

              <div class="inner">

                <h5 class="text-right text-white"><?=rupiah($today)?></h5>

                <p class="text-white">Hari Ini</p>

              </div>

              <div class="icon">

                <i class="ion ion-bag"></i>

              </div>

            </div>

          </div>

        </div>

        

        <div class="row">

          <div class="col-6 col-sm-6 col-md-3">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tshirt"></i></span>

              <div class="info-box-content">

                <span class="info-box-text">Sandang</span>

                <span class="info-box-number"><?=rupiah($sandang)?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>



          <div class="col-6 col-sm-6 col-md-3">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-pizza-slice"></i></span>

              <div class="info-box-content">

                <span class="info-box-text">Pangan</span>

                <span class="info-box-number"><?=rupiah($pangan)?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>



          <div class="col-6 col-sm-6 col-md-3">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-home"></i></span>

              <div class="info-box-content">

                <span class="info-box-text">Papan</span>

                <span class="info-box-number"><?=rupiah($papan)?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>



          <div class="col-6 col-sm-6 col-md-3">

            <div class="info-box mb-3">

              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-paper-plane"></i></span>

              <div class="info-box-content">

                <span class="info-box-text">Tersier</span>

                <span class="info-box-number"><?=rupiah($tersier)?></span>

              </div>

              <!-- /.info-box-content -->

            </div>

            <!-- /.info-box -->

          </div>

        </div>


        <div class="card">

          <div class="card-body">

            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">

              <li class="nav-item">

                <a class="nav-link active" id="custom-content-outcome-tab" data-toggle="pill" href="#custom-content-outcome" role="tab" aria-controls="custom-content-outcome" aria-selected="true">Pengeluaran</a>

              </li>

              <li class="nav-item">

                <a class="nav-link" id="custom-content-income-tab" data-toggle="pill" href="#custom-content-income" role="tab" aria-controls="custom-content-income" aria-selected="false">Pemasukan</a>

              </li>

            </ul>

            <div class="tab-content" id="custom-content-above-tabContent">

              <div class="tab-pane fade show active" id="custom-content-outcome" role="tabpanel" aria-labelledby="custom-content-outcome-tab">

                <form  method='POST' action='<?=base_url()?>User/simpan' class="mt-2">

                  <input type="hidden" name="id_user" value="1">

                  <div class="form-group">

                    <select class="form-control" style="width: 100%;" name="id_kategori">

                      <?php foreach ($kategori->result() as $key) {?>

                        <option value="<?=$key->id_kategori;?>"><?=$key->nama_kategori;?></option>

                      <?php } ?>

                    </select>

                  </div>

                  <div class="form-group">

                    <input type="text" name="ket_pengeluaran" class="form-control" placeholder="Keterangan" required> 

                  </div>

                  <div class="form-group">

                    <input type="number" name="nominal_pengeluaran" class="form-control" placeholder="Nominal" required> 

                  </div>

                  <div class="group">

                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                    <button type="reset" class="btn btn-danger btn-block">Reset</button>

                  </div>

                </form>

              </div>

              <div class="tab-pane fade" id="custom-content-income" role="tabpanel" aria-labelledby="custom-content-income-tab">

                <form method="post" action="<?=base_url()?>User/simpanPemasukan" class="mt-2">
              
                  <div class="form-group">
                    
                    <input type="text" name="ket" class="form-control" required="" placeholder="Keterangan">

                  </div>

                  <div class="form-group">
                    
                    <input type="number" name="nominal" class="form-control" required="" placeholder="Nominal">
     
                  </div>

                  <div class="form-group">
                    
                    <button type="submit" class="btn btn-block btn-primary">Simpan</button>

                    <button type="reset" class="btn btn-danger btn-block">Reset</button>

                  </div>

                </form>

              </div>

            </div>

          </div>

        </div>

      

        <!-- <div class="card">

          <div class="card-header">
            
            Pengeluaran

          </div>

          <div class="card-body">

            <form  method='POST' action='<?=base_url()?>User/simpan'>

              <input type="hidden" name="id_user" value="1">

              <div class="form-group">

                <select class="form-control" style="width: 100%;" name="id_kategori">

                  <?php foreach ($kategori->result() as $key) {?>

                    <option value="<?=$key->id_kategori;?>"><?=$key->nama_kategori;?></option>

                  <?php } ?>

                </select>

              </div>

              <div class="form-group">

                <input type="text" name="ket_pengeluaran" class="form-control" placeholder="Keterangan">

              </div>

              <div class="form-group">

                <input type="number" name="nominal_pengeluaran" class="form-control" placeholder="Nominal">

              </div>

              <div class="group">

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>

                <button type="reset" class="btn btn-danger btn-block">Reset</button>

              </div>

            </form>

          </div>

        </div>

        <div class="card">

          <div class="card-header">
            
            Pemasukan

          </div>
            
          <div class="card-body">
            
            <form method="post" action="<?=base_url()?>User/simpanPemasukan">
              
              <div class="form-group">
                
                <input type="text" name="ket" class="form-control" required="" placeholder="Keterangan">

              </div>

              <div class="form-group">
                
                <input type="number" name="nominal" class="form-control" required="" placeholder="Nominal">
 
              </div>

              <div class="form-group">
                
                <button type="submit" class="btn btn-block btn-primary">Simpan</button>

              </div>

            </form>

          </div>

        </div> -->

        <!-- 7 day -->

        <?php foreach ($date as $key) {?>

          <div class="card card-default">

            <div class="card-header">
              <h3 class="card-title">
                <i class="fas fa-calendar"></i>
                <?= date('d F Y', strtotime($key)) ?>
              </h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">

              <?php 
                foreach ($weekly as $row) {
                  if (date('d F Y', strtotime($key))==date('d F Y', strtotime($row->waktu))) {
              ?>

                <div class="callout callout-default">
                  <h5><?=rupiah($row->nominal_pengeluaran)?></h5>

                  <p><?=$row->ket_pengeluaran?></p>
                </div>

              <?php } } ?>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        <?php } ?>

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

  </div>

  <!-- /.content-wrapper -->