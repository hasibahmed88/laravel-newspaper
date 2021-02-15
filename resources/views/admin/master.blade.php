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
    <link href="{{'/'}}admin/lib/highlightjs/github.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/datatables/jquery.dataTables.css" rel="stylesheet">

    <link href="{{'/'}}admin/lib/medium-editor/medium-editor.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/medium-editor/default.css" rel="stylesheet">
    <link href="{{'/'}}admin/lib/summernote/summernote-bs4.css" rel="stylesheet">

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

    <script src="{{'/'}}admin/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{'/'}}admin/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{'/'}}admin/lib/highlightjs/highlight.pack.js"></script>
    

    <script src="{{'/'}}admin/lib/select2/js/select2.min.js"></script>

    <script>
      $(function(){
    
        'use strict';
    
        $('.select2').select2({
          minimumResultsForSearch: Infinity
        });
    
        // Select2 by showing the search
        $('.select2-show-search').select2({
          minimumResultsForSearch: ''
        });
    
        // Select2 with tagging support
        $('.select2-tag').select2({
          tags: true,
          tokenSeparators: [',', ' ']
        });
    
      });
    </script>

    <script src="{{'/'}}admin/lib/medium-editor/medium-editor.js"></script>
    <script src="{{'/'}}admin/lib/summernote/summernote-bs4.min.js"></script>
    <script>
      $(function(){
        'use strict';

        // Inline editor
        var editor = new MediumEditor('.editable');

        // Summernote editor
        $('#summernote').summernote({
          height: 150,
          // tooltip: false
        })
      });
    </script>

    <script src="{{'/'}}admin/js/starlight.js"></script>
    <script src="{{'/'}}admin/js/ResizeSensor.js"></script>
    <script src="{{'/'}}admin/js/dashboard.js"></script>

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
