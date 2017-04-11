<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <title> @yield('title', 'Laravel')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/w3.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="{{ asset('css/front-custom.css') }}">
    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
    </script>
<body class="w3-light-grey">
    <!-- HEADER -->
    @include('front.header')
    <!-- END HEADER -->
    <!-- CONTENT -->
    @yield('content')
    <!-- END CONTENT -->
    <!-- FOOTER -->
    @include('front.footer')
    <!-- END FOOTER -->
    <!-- MAIN SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- END MAIN SCRIPTS -->
    <!-- CUSTOM SCRIPTS -->
    @yield('custom-js')
    <!-- END CUSTOM SCRIPTS -->
</body>
</html>
