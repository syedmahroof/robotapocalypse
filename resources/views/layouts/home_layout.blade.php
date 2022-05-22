<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     {{-- Global StyleSheet Start --}}
     <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>


     <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('assets/libs/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('assets/client/plugins/css/jquery-confirm.min.css')}}">

     @yield('style')



</head>
<body
    get-all-designation={{ route('designation.get-all-desitinations') }}
    get-all-employee={{ route('employee.get-all-employee') }}
>
    <div id="app">
        @include('includes.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
       <script src="{{ asset('assets/libs/jquery-1.10.2.min.js') }}"> </script>

       <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.min.js') }}"> </script>
       <script src="{{ asset('assets/client/plugins/jquery-confirm.min.js') }}"> </script>
       <input type="hidden" id="_url" value="{{ url('/') }}">
    <script>
        $('.datepicker').datepicker()
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });
    </script>

    {{-- Custom JavaScript Start --}}

    @yield('script')


</body>
</html>
