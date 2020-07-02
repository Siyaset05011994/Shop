<!DOCTYPE html>
<html>
<head>
    @include('partials.admin.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('partials.admin.header')
    <!-- Main Sidebar Container -->
   @include('partials.admin.left-sidebar')


      @yield('content')

      @include('partials.admin.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('partials.admin.footer-scripts')

</body>
</html>
