<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{ Html::style('css/font-awesome.min.css') }}
    {{ Html::style('css/styles.css') }}
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="container-fluid " >
      <div class="row">
        @yield('content')
      </div>
    </div>
    <!-- Scripts -->
    <script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
