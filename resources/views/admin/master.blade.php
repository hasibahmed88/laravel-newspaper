<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title')</title>

    <!-- vendor css -->
    <link href="{{'/'}}admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/rickshaw/rickshaw.min.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/datatables/jquery.dataTables.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{'/'}}admin/css/starlight.css">
  </head>

  <body>

    @include('admin.include.header');

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">

  <div class="sl-pagebody">
    @yield('body')

  </div><!-- sl-pagebody -->
  
  <footer class="sl-footer mt-5">
    <div class="footer-left">
      <div class="mg-b-2">Copyright &copy; 2017. Starlight. All Rights Reserved.</div>
      <div>Made by ThemePixels.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
      <span class="tx-uppercase mg-r-10">Share:</span>
      <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
      <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
    </div>
  </footer>
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


    <script src="{{'/'}}admin/lib/jquery/jquery.js"></script>
    <script src="{{'/'}}admin/lib/popper.js/popper.js"></script>
    <script src="{{'/'}}admin/lib/bootstrap/bootstrap.js"></script>
    <script src="{{'/'}}admin/lib/jquery-ui/jquery-ui.js"></script>
    <script src="{{'/'}}admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="{{'/'}}admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="{{'/'}}admin/lib/d3/d3.js"></script>
    <script src="{{'/'}}admin/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{'/'}}admin/lib/chart.js/Chart.js"></script>
    <script src="{{'/'}}admin/lib/Flot/jquery.flot.js"></script>
    <script src="{{'/'}}admin/lib/Flot/jquery.flot.pie.js"></script>
    <script src="{{'/'}}admin/lib/Flot/jquery.flot.resize.js"></script>
    <script src="{{'/'}}admin/lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="{{'/'}}admin/js/starlight.js"></script>
    <script src="{{'/'}}admin/js/ResizeSensor.js"></script>
    <script src="{{'/'}}admin/js/dashboard.js"></script>

    <script src="{{'/'}}admin/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{'/'}}admin/lib/datatables-responsive/dataTables.responsive.js"></script>

    <script>
     $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
        });
    </script>
  </body>
</html>
