<!DOCTYPE html>
<html lang="id" class="h-100">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-MONKUYANLIK</title>
    <link rel="icon" type="image/png" href="https://emonkuyanlik.sumutprov.go.id/images/logo/logo_icon.ico">
    <link href="css/bootstrap.mincf3c.css?v=1670558969" rel="stylesheet">
    <link type="text/css"
        href="http://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&amp;display=swap"
        rel="stylesheet">
    <link href="admin/temp_assets/fonts/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="css/mystyle_landingc677.css?v=1671852700" rel="stylesheet">
    <link href="css/luno-style7f26.css?v=1670568591" rel="stylesheet">
    <link href="css/swiper.min7f26.css?v=1670568591" rel="stylesheet">
    <link href="css/background7f26.css?v=1670568591" rel="stylesheet">
    <link href="form_assets/css/custom48bd.css?v=1672209157" rel="stylesheet">
    <style>
        .navbar-nav .nav-link {
            transition: color 0.3s, background-color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #ffffff; /* Text color on hover */
            background-color:grey; /* Background color on hover */
            border-radius: 5px; /* Optional: add rounded corners */
        }
       
    </style>

</head>

<div class="background">

    @include('partials/navbar')

    <div class="container">

        @yield('container')

    </div>

</div>

 <!-- jQuery, Popper.js, and Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
