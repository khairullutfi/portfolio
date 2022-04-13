<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="/dashboard/style/main.css" rel="stylesheet" />


</head>

<body>



  <!-- Page Content -->
  @yield('content')

  
  <!-- Bootstrap core JavaScript -->
  <script src="/dashboard/vendor/jquery/jquery.slim.min.js"></script>
  <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script src="/dashboard/script/navbar-scroll.js"></script>
  @stack('addon-script')
</body>

</html>