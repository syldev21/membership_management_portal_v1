<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VOSH Church Buru Buru |@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://kit.fontawesome.com/90018b3b25.js" crossorigin="anonymous"></script>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.min.css') }}">

    <!-- DataTables JS -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>

    <!-- Styles -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/owl.carousel.min.css" rel="stylesheet"/>
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet"/>
    <link href="css/lib/weather-icons.css" rel="stylesheet"/>
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


    <link rel="icon" type="image/png" sizes="192x192"
          href="{{ asset('images/favicon/logo-official/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"
          href="{{ asset('images/favicon/logo-official/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon/logo-official/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
          href="{{ asset('images/favicon/logo-official/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
          href="{{ asset('images/favicon/logo-official/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/logo-official/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon/logo-official/favicon.ico') }}" type="image/x-icon">
</head>
<body class="">

@include('layouts.includes.improved-admin.sidebar')

@include('layouts.includes.improved-admin.header')

@yield('content')

<!-- jquery vendor -->
<script src="js/lib/jquery.min.js"></script>
<script src="js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="js/lib/menubar/sidebar.js"></script>
<script src="js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<script src="js/lib/bootstrap.min.js"></script>
<script src="js/scripts.js"></script>
<!-- bootstrap -->

<script src="js/lib/calendar-2/moment.latest.min.js"></script>
<script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
<script src="js/lib/calendar-2/pignose.init.js"></script>


<script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
<script src="js/lib/weather/weather-init.js"></script>
<script src="js/lib/circle-progress/circle-progress.min.js"></script>
<script src="js/lib/circle-progress/circle-progress-init.js"></script>
<script src="js/lib/chartist/chartist.min.js"></script>
<script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
<script src="js/lib/sparklinechart/sparkline.init.js"></script>
<script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
<!-- scripit init-->
<script src="js/dashboard2.js"></script>
</body>
</html>
