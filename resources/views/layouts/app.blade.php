<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield("title") - Internet Banking 
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('css/material-dashboard/material-dashboard.css?v=2.1.2') }}" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
      <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    <footer class="footer">
      <div class="container-fluid">
        <nav class="float-left">
        </nav>
        <div class="copyright float-right">
          &copy;
          <script>
            document.write(new Date().getFullYear())
          </script>, Hiberbank Internet Banking v1.0.0
        </div>
      </div>
    </footer>
  </div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('js/material-dashboard/core/jquery.min.js')}}"></script>
<script src="{{asset('js/material-dashboard/core/popper.min.js')}}"></script>
<script src="{{asset('js/material-dashboard/core/bootstrap-material-design.min.js')}}"></script>
<script src="{{asset('js/material-dashboard/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
</body>

</html>