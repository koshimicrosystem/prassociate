<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
@yield('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>ADS |  {{Auth::User()->name}}</title>
@yield('style1')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@yield('style2')
<script src="https://kit.fontawesome.com/d569c4180b.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper" id="app">
<div>
  <!-- Navbar -->
  @include('components.post.header')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  @include('components.post.leftbar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding-top: 10px; background-color: white" >
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    @yield('body')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('components.post.rightbar')
  <!-- /.control-sidebar -->
  
  <!-- Main Footer -->
  @include('components.post.footer')
</div>
</div>
<!-- jQuery -->
@yield('script1')
<script src="{{asset('js/app.js')}}"></script>
@yield('script2')
</body>
</html>
