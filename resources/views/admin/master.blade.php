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

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{'/'}}admin/css/starlight.css">
  </head>

  <body>

    @include('admin.include.header');
    @yield('body')

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
  </body>
</html>
