<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{URL::to('uploads/logo.png')}}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{URL::to('src/css/loader.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('src/css/font-awesome.min.css')}}">


    <script src="{{URL::to('src/js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 3000
            });

            $('.carousel').carousel('cycle');
        });
    </script>
    @yield('styles')
</head>
<body>
<div id="page_loading" class="dark">
    <div class="loader"><div><div></div></div></div>
    <noscript>
        <div class="nojs">Please enable <strong>JavaScript</strong> and reload this page
            <p><a href="http://goo.gl/d5o4zF" target="_blank" rel="nofollow">How enable Javascript</a></p>
        </div>
    </noscript>
</div>

@yield('header')
@yield('content')


@include('partials.footer')



<script src="{{URL::to('src/js/bootstrap.min.js')}}"></script>
@yield('scripts')
<script >
    $('.carousel').carousel({
        interval: 2000
    })
</script>
<script src="{{URL::to('src/js/loader.js')}}"></script>
</body>
</html>