<!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

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

          <div class="col-12 col-sm-6 col-md-3">

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



          <div class="col-12 col-sm-6 col-md-3">

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



          <div class="col-12 col-sm-6 col-md-3">

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



          <div class="col-12 col-sm-6 col-md-3">

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

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->

  </div>

  <!-- /.content-wrapper