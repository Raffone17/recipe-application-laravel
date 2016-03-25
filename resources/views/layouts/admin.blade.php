<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - {{ $site_name=App\Setting::first()->site_name }}</title>

    <!-- Bootstrap Core CSS -->
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/sb-admin.css',true)}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css',true)}}" rel="stylesheet" type='text/css'>

    <!-- Morris Charts CSS -->
    <link href="{{asset('assets/css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-color:white;">

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.index') }}">Admin {{ $site_name }}</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>{{ Auth::user()->name }}</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>{{ Auth::user()->name }}</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>{{ Auth::user()->name }}</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ ucfirst(Auth::user()->name) }} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('user.show',['id' => Auth::id()]) }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.setting') }}"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li {{{ (Request::is('admin') ? 'class=active' : '') }}} >
                        <a href="{{ route('admin.index') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li {{{ (Request::is('admin/recipe') ? 'class=active' : '') }}} >
                        <a href="{{route('admin.recipe') }}"><i class="fa fa-fw fa-cutlery"></i> Ricette</a>
                    </li>
                    <li {{{ (Request::is('admin/ingredient') ? 'class=active' : '') }}} >
                        <a href="{{ route('admin.ingredient') }}"><i class="fa fa-fw fa-shopping-cart"></i> Ingredienti</a>
                    </li>
                    <li {{{ (Request::is('admin/user') ? 'class=active' : '') }}} >
                        <a href="{{ route('admin.user') }}"><i class="fa fa-fw fa-users"></i> Utenti</a>
                    </li>
                    <li {{{ (Request::is('admin/category') ? 'class=active' : '') }}} >
                        <a href="{{ route('admin.category') }}"><i class="fa fa-fw fa-tags"></i> Categorie</a>
                    </li>
                    <li {{{ (Request::is('admin/setting') ? 'class=active' : '') }}} >
                        <a href="{{ route('admin.setting') }}"><i class="fa fa-fw fa-wrench"></i> Impostazioni</a>
                    </li>
                    
                    <li {{{ (Request::is('recipe/create') ? 'class=active' : '') }}} >
                        <a href="{{ route('recipe.create') }}"><i class="fa fa-fw fa-file"></i> Crea Ricetta</a>
                    </li>
                    <li {{{ (Request::is('/') ? 'class=active' : '') }}} >
                        <a href="{{ url('/home') }}"><i class="fa fa-fw fa-laptop "></i> Vedi il sito</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" >
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
           
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
   
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
        
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/morris/morris-data.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    
    <!-- Personal Scripts -->


</body>

</html>
