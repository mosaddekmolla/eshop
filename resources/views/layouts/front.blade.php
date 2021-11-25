<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <script src="sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2.min.css">
  <title>
    @yield('title')
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="../assets/css/custom.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="">
  <div class="wrapper">

    @include('layouts.inc.sidebar')

    <div class="main-panel">

    @include('layouts.inc.navbar')


    <div class="content">
        @yield('content')
    </div>


    @include('layouts.inc.footer')



    </div>
  </div>


      <!--   Core JS Files   -->
      <script src="../assets/js/core/jquery.min.js"></script>
      <script src="../assets/js/core/popper.min.js"></script>
      <script src="../assets/js/core/bootstrap.min.js"></script>

      <script src="../assets/js/black-dashboard.min.js?v=1.0.0"></script>


      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      @if (Session('status'))
        <script>
            swal("{{Session('status')}}");
        </script>

      @endif

      @yield('scripts');

    </body>

    </html>
