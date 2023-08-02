<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buru Buru VOSH Church | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="b-vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/90018b3b25.js" crossorigin="anonymous"></script>
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 400px; /* set the height of the container */
        }

        .image-container img {
            width: auto;
            height: 100%;
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }






        .input-container {
            position: relative;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            font-size: 16px;
            color: #aaa;
        }

        .form-control-user {
            padding-left: 30px; /* Adjust as needed */
        }
        /* Form header style */
        .form-header {
            background-color: blue;
            color: white;
            border-radius: 5px;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        /* Custom list style */
        .text-dark ol {
            counter-reset: item;
            list-style-type: none;
            padding-left: 0;
        }

        .text-dark li {
            display: block;
        }

        .text-dark li:before {
            content: counter(item) ".";
            counter-increment: item;
            margin-right: 8px;
            font-weight: bold;
        }

        /* Custom nested list style */
        .text-dark ol ol {
            counter-reset: subitem;
        }

        .text-dark ol ol li:before {
            content: counter(item) "." counter(subitem, lower-alpha) ".";
            counter-increment: subitem;
            margin-right: 8px;
            font-weight: bold;
        }


    </style>
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/favicon/logo-official/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('images/favicon/logo-official/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon/logo-official/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/logo-official/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/logo-official/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/logo-official/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon/logo-official/favicon.ico') }}" type="image/x-icon">

</head>
{{--<body class="bg-info" style="background-image: url({{ asset('images/slide2.jpeg') }});background-size: cover; background-repeat: no-repeat; " id="image_head">--}}
{{--<body class="bg-info" style="background-image: url('{{ asset('images/slide-view/20221009153116_IMG_1369.JPG') }}'); background-size: cover; background-repeat: no-repeat;" id="image_head">--}}
<body class="bg-info" style="background-image: url('{{ asset('images/slide-view/_MG_1445.JPG') }}'); background-size: cover; background-repeat: no-repeat;" id="image_head">



    <main>
        <div class="container mt-5 page-here">
            <h1 class="display-4 text-primary" style="text-align: center">Welcome to VOSH Church Buru Buru<br><span style="display: block; text-align: center;">Membership Portal</span></h1>
            @yield('content')
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="{{ asset('js/function.js') }}"></script>
    @yield('script')
</body>
</html>
<script>
    $(document).ready(function () {
        var images = [
            "{{asset('images/slide-view/slide3.jpeg')}}",
            "{{asset('images/slide-view/slide4.jpeg')}}",
            "{{asset('images/slide-view/slide5.jpeg')}}",
            "{{asset('images/slide-view/slide6.jpeg')}}",
            "{{asset('images/slide-view/slide7.jpeg')}}",
            "{{asset('images/slide-view/slide8.jpeg')}}",
            "{{asset('images/slide-view/slide9.jpeg')}}",
            "{{asset('images/slide-view/slide10.jpeg')}}",
            "{{asset('images/slide-view/slide11.jpeg')}}",
        ]
        var image_head = document.getElementById("image_head");
        image_head.style.backgroundRepeat = "no-repeat";
        image_head.style.backgroundSize = "cover";
        image_head.style.height = '100%';
        image_head.style.width = '100%';

        var i = 0;
        // setInterval(function() {
        //     image_head.style.backgroundImage = "url(" + images[i] + ")";
        //     i = i + 1;
        //     if (i == images.length) {
        //         i =  0;
        //     }
        // }, 5000);

    });
</script>
