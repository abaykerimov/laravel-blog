<!doctype html>
<html lang="ru" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-vue@2.0.0-rc.1/dist/bootstrap-vue.css"></link>
    <link rel="shortcut icon" href="/images/favicon.ico"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script type='text/javascript' src='{{ asset('js/legacy/vue.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/legacy/axios.js') }}'></script>
    <script src="https://unpkg.com/bootstrap-vue@2.0.0-rc.1/dist/bootstrap-vue.js"></script>
    <script src="{{ asset('js/admin/require.min.js') }}"></script>
    <script>
        requirejs.config({
            baseUrl: ''
        });
    </script>
    <!-- Dashboard Core -->
    <link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    @stack('styles')
</head>
<body>
<div class="page" id="app">
    <div class="page-main">
        @auth
            @include('admin.blocks.header')
        @endauth
        <div class="my-3 my-md-5">
            @yield('content')
        </div>
    </div>
    @include('admin.blocks.footer')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cgb46t2y39y00y9slf9cgs81l747j3rihvja55fjrv47w5po"></script>
<script type='text/javascript' src='{{ asset('js/vue/admin/app.js') }}'></script>
@stack('scripts')
</body>
</html>