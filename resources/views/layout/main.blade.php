<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PGG - CENTRE | <?= $title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./assets/template/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  {{-- Data Table --}}
  {{-- <link rel="stylesheet" href="./assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./assets/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
  <?php
    if (isset($header_css)) {
        foreach ($header_css as $hcss) { ?>
            <link href="<?= $hcss ?>" rel="stylesheet">
    <?php }
    } ?>
  {{-- End Data Table --}}
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="./assets/template/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}


  {{-- navbar --}}
  @include('nav.navbar')
  {{-- End navbar --}}

  
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        {{-- Conten --}}
        @yield('content')
        {{-- End Contebn --}}
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <center>
        <strong>Copyright &copy; 2022-<?= date('Y') ?> PT. BEHAESTEX</a></strong>
    </center>
    
    {{-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div> --}}
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="./assets/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/template/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="./assets/template/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="./assets/template/plugins/raphael/raphael.min.js"></script>
<script src="./assets/template/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="./assets/template/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="./assets/template/plugins/chart.js/Chart.min.js"></script>

<?php
if (isset($footer_js)) {
    foreach ($footer_js as $fjs) { ?>
        <script type="text/javascript" src="<?= $fjs ?>"></script>
<?php }
} ?>
<!-- AdminLTE for demo purposes -->
<script src="./assets/template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="./assets/template/dist/js/pages/dashboard2.js"></script> --}}
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>
</html>