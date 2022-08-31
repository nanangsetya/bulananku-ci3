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

<!-- overlayScrollbars -->

<script src="<?= base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE App -->

<script src="<?= base_url();?>assets/dist/js/adminlte.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="<?= base_url();?>assets/dist/js/pages/dashboard.js"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?= base_url();?>assets/dist/js/demo.js"></script>

<!-- DataTables -->

<script src="<?= base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>

<script src="<?= base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">

    $('#alert-notification').delay(2000).fadeOut();

</script>

<script>

  $(function () {

    $("#example1").DataTable();

    $('#example2').DataTable({

      "paging": false,

      "lengthChange": false,

      "searching": false,

      "ordering": false,

      "info": true,

      "autoWidth": false,

    });

  });

</script>

</body>

</html>

