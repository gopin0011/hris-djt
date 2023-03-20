<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name') }}</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
   <!-- iCheck -->
   <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
   <!-- JQVMap -->
   <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
   <!-- Theme style -->
   <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
   <!-- summernote -->
   <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.css')}}">
   <!-- DataTables -->
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
 
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <!-- Ekko Lightbox -->
   <link rel="stylesheet" href="{{asset('assets/plugins/ekko-lightbox/ekko-lightbox.css')}}">
   <style>
      a, a:hover{
        color: inherit;
        text-decoration: none;
      }
     </style>
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed layout-footer-fixed layout-fixed">

<!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    @include('style.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <div class="brand-link elevation-4" style="padding-left: 20px">
        <span class="fas fa-users"></span>
        <span class="brand-text font-weight-light" style="padding-left: 5px;font-size:12pt"><a href="{{ route('home') }}"><strong>DJT</strong>|Human Resources</a></span>
      </div>
      <!-- Sidebar -->
      @include('style.overtimeadmin')
      <!-- /.sidebar -->
    </aside>
    <!-- Content-->
    @yield ('content')
    <!-- /.content-->
    @include('style.footer')
  </div>
  
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('assets/dist/js/pages/dashboard2.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('assets/plugins/filterizr/jquery.filterizr.min.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "dom": 'Bfrtip',
        "buttons": ['copy', 'csv', 'excel', 'pdf', 'print']
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "dom": 'Bfrtip',
        "buttons": ['copy', 'csv', 'excel', 'pdf', 'print']
      });
      $("#example3").DataTable({
        "responsive": true,
        "autoWidth": false,
        "searching": false,
        "lengthChange": false,
      });
      $("#example4").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $("#example7").DataTable({
        "dom": 'Bfrtip',
        "responsive": true,
        "autoWidth": false,
      });
    });
</script>

<script>
  $(document).ready(function() {
    $('#example8').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ],
    } );
} );
</script>

<script>
  $(document).ready(function() {
    var t = $('#ordertable').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
  $(document).ready(function() {
      var t = $('#example5').DataTable({
          dom: 'Bfrtip',
          buttons: ['excel'],
          processing : true,
          serverSide : true,
          ajax : {
              url : "{{ route('applications.all') }}",
              type: 'GET'
          },

          columns: [
              { "data": null,"sortable": false, 
     render: function (data, type, row, meta) {
               return meta.row + meta.settings._iDisplayStart + 1;
              }  
  },
              {data: 'a', name: 'a'},
              {data: 'b', name: 'b'},
              {data: 'c', name: 'c'},
              {data: 'd', name: 'd'},
              {data: 'e', name: 'e'},
              {data: 'f', name: 'f'},
              {data: 'g', name: 'g'},
              {data: 'h', name: 'h'},
              {data: 'i', name: 'i'},
              {data: 'j', name: 'j'},
              {data: 'k', name: 'k'},
              {data: 'l', name: 'l'},
              {data: 'm', name: 'm'},
              {data: 'n', name: 'n'},
              {data: 't', name: 't'},
              {data: 'u', name: 'u'},
              {data: 'v', name: 'v'},
              {data: 'w', name: 'w'},
              {data: 'o', name: 'o'},
              {data: 'p', name: 'p'},
              {data: 'q', name: 'q'},
              {data: 'r', name: 'r'},
              {data: 's', name: 's'},
          ],
          order: [[ 0, 'asc' ]]
      });
  });
</script>

<script>
  $(document).ready(function() {
      var t = $('#example6').DataTable({
          dom: 'Bfrtip',
          buttons: ['excel'],
          processing : true,
          serverSide : true,
          ajax : {
              url : "{{ route('documents.all') }}",
              type: 'GET'
          },

          columns: [
              { "data": null,"sortable": false, 
     render: function (data, type, row, meta) {
               return meta.row + meta.settings._iDisplayStart + 1;
              }  
  },
              {data: 'name', name: 'name'},
              {data: 'file', name: 'file'},
              {data: 'tipe', name: 'tipe'},
          ],
          order: [[ 0, 'asc' ]]
      });
  });
</script>

<script type="text/javascript"> 
  $(document).ready(function () {
      $('#table-datatables').DataTable({
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
      });
  });
</script>

<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

@include('sweetalert::alert')
</body>
</html>
