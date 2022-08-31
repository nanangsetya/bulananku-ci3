<footer class="main-footer">

    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>

    All rights reserved.

    <div class="float-right d-none d-sm-inline-block">

      <b>Version</b> 3.0.0-rc.1

    </div>

  </footer>



  <!-- Control Sidebar -->

  <aside class="control-sidebar control-sidebar-dark">

    <!-- Control sidebar content goes here -->

  </aside>

  <!-- /.control-sidebar -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>

<!-- jQuery UI 1.11.4 -->

<script src="<?= base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

  $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->

<script src="<?= base_url();?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- overlayScrollbars -->

<script src="<?= base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Select2 -->

<script src="<?= base_url();?>assets/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->

<script src="<?= base_url();?>assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url();?>assets/dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?= base_url();?>assets/dist/js/demo.js"></script>



<script type="text/javascript">

   $(function () {

      //Initialize Select2 Elements

      $('.select2').select2({

        theme: 'bootstrap4'

      })

    });

</script>

</body>

</html>

