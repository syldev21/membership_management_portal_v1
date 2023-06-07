<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.min.js"></script>

    <script src="{{ asset('js/function.js') }}"></script>
</head>
<body class="">
@include('layouts.includes.admin.navbar')

<div id="layoutSidenav">
    @include('layouts.includes.admin.sidebar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.includes.admin.footer')
    </div>
</div>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/script.min.js') }}"></script>
<script src="{{asset('js/script.js')}}"></script>

@yield('script')
</body>
</html>
