<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
<link href="/assets/css/style.css" rel="stylesheet" />
  <link rel="icon" href="/assets/images/header-logo.png">

   <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">

   <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

   <!-- Style -->

   <title>yeksil</title>
        <!-- ==================== CSS Libraries Used ================== -->


    @yield('css')

</head>

<body>
    <div class="wrapper">

        @include('layouts.header')

        <main class="page-content">

            @yield('content')

        </main>
      
        @include('layouts.footer')

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/main.js"></script>

    @yield('js')

</body>

</html>
