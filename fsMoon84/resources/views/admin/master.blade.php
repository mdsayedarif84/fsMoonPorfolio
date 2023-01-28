<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
<!-- DataTables -->
  @include('admin.links.css')

</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.includes.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('admin.includes.sidebar')
  <!-- Content Wrapper. Contains page content -->
    <main class="py-4">
      @yield('body')
    </main>
  <!-- /.content-wrapper -->

  {{-- Footer --}}
  @include('admin.includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  
@include('admin.links.js')
</body>
</html>
