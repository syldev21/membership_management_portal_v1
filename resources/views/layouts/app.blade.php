<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
{{--    <link href="b-vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">--}}
    <link
        href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
        rel="stylesheet"  type='text/css'>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-info" style="background-image: url({{ asset('images/slide2.jpeg') }});background-size: cover;
 background-repeat: no-repeat; " id="image_head">
    <main>
        @yield('content')
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
        setInterval(function() {
            image_head.style.backgroundImage = "url(" + images[i] + ")";
            i = i + 1;
            if (i == images.length) {
                i =  0;
            }
        }, 5000);

    });
</script>
