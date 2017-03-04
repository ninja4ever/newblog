<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet"> 
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest() )
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              kategorie <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/post-category')}}">Zobacz</a>
                                </li>
                                <li>
                                    <a href="{{url('/post-category/add')}}">Dodaj</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              wpisy <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/posts')}}">Zobacz</a>
                                </li>
                                <li>
                                    <a href="{{url('/post/add')}}">Dodaj</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid" style="padding-top:50px;">
          <!-- your page content -->
          <div class="col-sm-12 col-md-12">
            @include('common.flash')
          </div>
          <div class="col-md-12 col-sm-12">
            @yield('content')
          </div>
      </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  {{--  <script src="{{ URL::asset('js/confirm-bootstrap.js') }}"></script> --}}
    {{Html::script('js/jquery.confirm.min.js')}}

    <script>
        // $('.delete-confirm').confirmModal({
        //     confirmTitle: '{{ trans("messages.modal_confirmTitle") }}',
        //     confirmMessage: '{{ trans("messages.modal_confirmMessage") }}',
        //     confirmStyle: 'danger',
        //     confirmCancel: '{{ trans("messages.modal_confirmCancel") }}',
        //     confirmOk: '<i class="fa fa-trash"></i> {{ trans("messages.modal_confirmOK") }}',
        //     confirmCallback: function (target) {
        //         var link = $(target).parent().submit();
        //         //window.location.href = link;
        //     }
        // });
        $(".delete-confirm").confirm({
            text: "Czy na pewno usunąć ?",
            title: "Usuwanie",
            confirm: function(target) {
               var link = $(target).parent().submit();
            },
            cancel: function(target) {
                // nothing to do
            },
            confirmButton: '<i class="fa fa-trash"></i> OK',
            cancelButton: "Anuluj",
            post: true,
            confirmButtonClass: "btn-danger",
            cancelButtonClass: "btn-default",
            dialogClass: "modal-dialog" // Bootstrap classes for large modal
        });
    </script>
    @yield('custom-js')
</body>
</html>
