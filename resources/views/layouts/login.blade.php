<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('login-styles/css/style.css')}}">



</head>

<body class="img js-fullheight" style="background-image: url('{{ asset('login-styles/images/bg.jpg') }}');">
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Login</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset('login-styles/js/jquery.min.js')}}"></script>
<script src="{{asset('login-styles/js/popper.js')}}"></script>
<script src="{{asset('login-styles/js/bootstrap.min.js')}}"></script>
<script src="{{asset('login-styles/js/main.js')}}"></script>

</body>

</html>
