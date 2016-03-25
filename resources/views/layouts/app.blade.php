<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $site_name=App\Setting::first()->site_name }}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/theme'.App\Setting::first()->theme.'.min.css',true)}}" rel="stylesheet" type='text/css'>
    <link href="{{asset('assets/css/style.css',true)}}" rel="stylesheet" type='text/css'>
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
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
                    {{ $site_name }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                   
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ route('recipe.index') }}">Ricette</a></li>
                     @if (Auth::check())
                    <li><a href="{{ route('recipe.create') }}">Crea ricetta</a></li>
                    @endif
                </ul>
                <div class="col-sm-4 col-md-4">
                    {{ Form::open(['route' => 'search.title', 'method' => 'get', 'role'=>'search', 'class'=>'navbar-form']) }}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="search">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    </form>
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Registrati</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                 <li><a href="{{ route('user.show',['id' => Auth::id()]) }}"><i class="glyphicon glyphicon-user"></i> Dettagli utente</a></li>
                                 @if (Auth::user()->isAdmin())
                                 <li><a href="{{ route('admin.index') }}"><i class="glyphicon glyphicon-wrench"></i> Amministrazione </a></li>
                                 @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                               
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
         @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status-warning'))
            <div class="alert alert-warning">
                {{ session('status-warning') }}
            </div>
            @endif
        @if(isset($statusinfo))
              <div class="alert alert-info">
                {{ $statusinfo }}
            </div>
        @endif
       @if(isset($errors))
          @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        @if(isset($error))
                            <li>{{$error}}</li>
                        @endif
                    @endforeach
                </ul>
                
            @endif 
        @endif
        </div>
    </div>
    @yield('content')

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src={{asset("assets/js/script.js")}}></script>
    
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
