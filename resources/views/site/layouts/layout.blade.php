<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper.min.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather%3A300%7CPlayfair+Display+SC%3A400%2C700%2C900%2C400italic%2C700italic%2C900italic%7CSource+Sans+Pro%3A200%2C300%2C400%2C600%2C700%2C900%2C200italic%2C300italic%2C400italic%2C600italic%2C700italic%2C900italic&amp;subset=latin&amp;ver=1521218824" type="text/css" media="all">
    <script type='text/javascript' src='{{ asset('js/legacy/vue.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/legacy/axios.js') }}'></script>
<body oncopy="return false" oncut="return false" onpaste="return false" oncontextmenu="return false">
<div id="app" class="outer-container">

    @include('site.blocks.header')
{{--    @yield('header', '')--}}

    <div class="container single-page">
        <div class="row">

            @yield('content')

{{--            @yield('sidebar', '')--}}
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->

@include('site.blocks.footer')
    {{--@yield('footer')--}}

<script type='text/javascript' src='{{ asset('js/vue/site/app.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/legacy/jquery.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/legacy/swiper.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/legacy/custom.js') }}'></script>

</body>
</html>