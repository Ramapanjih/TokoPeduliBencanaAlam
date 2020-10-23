<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TokoSedekah') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/slick.js') }}" ></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">  
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <style>
    .pointer {
        cursor:pointer;
    }
    </style>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-theme.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" type="text/css" rel="stylesheet">

    @livewireStyles
    

</head>
<body>
    <div id="app">
        <livewire:navbar/>
        
    @section('sidebar')

    @show

        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    @include('layouts.footer')
        @livewireScripts
    </div>
            <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
            <script type="text/javascript" src="{{ asset('js/jquery.js') }}" ></script>
            <script type="text/javascript" src="{{ asset('js/slick.js') }}" ></script>
            <script type="text/javascript" src="{{ asset('js/script.js') }}" ></script>
            <script>
                function changePesananStatus(_this, id) {
                    var status = $(_this).bootstrapToggle(}) == true ? 1 : 0;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                function changePesananStatus(_this, id) {
                    var status = $(_this).prop('checked') == true ? 1 : 0;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: `/Admin/MenuKelolaDataTransaksi`,
                        type: 'post',
                        data: {
                            _token: _token,
                            id: id,
                            status: status 
                    },
                    success: function (result) {
                    }
                    });
                }
            </script>
</body>
</html>
