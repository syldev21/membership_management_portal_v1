@extends('layouts.app')

@section('content')
    <div class="text-center mb-5">
        <p class="lead text-dark">Choose an option below:</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{route('login-page')}}" id="login_page" class="btn btn-primary btn-lg btn-block mb-3">
                <i class="fas fa-lock me-2"></i>Login Page
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{route('register-page')}}" id="registration_page" class="btn btn-secondary btn-lg btn-blockzzz">
                <i class="fas fa-user-plus me-2"></i>Registration Page
            </a>
        </div>
    </div>
@endsection

@section('style')
    <style>
        /* Background Overlay */
        body::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8)), url('{{ asset('images/slide-view/_MG_1445.JPG') }}');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
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
@endsection
@section('script')
    <script>
        $(document).ready(function (e) {
            e.preventDefault()
            alert('lulu')
        })
    </script>

@endsection
