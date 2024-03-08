{{-- @extends('layouts.app') --}}
@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
     Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
            <li class="active" >
                <a href="#">
                <i class="now-ui-icons design_app"></i>
                <h5>Accueil</h5>
                </a>
            </li>
      {{-- <div class="sidebar-wrapper" id="sidebar-wrapper"> --}}
        <ul class="nav">
            <li  >
                <a href="{{route('agences.index')}}">
                    <i class="fas fa-users fa-3x"></i>
                <h5>Agences</h5>
                </a>
            </li>
            <li  >
                <a href="{{route('chauffeurs.index')}}">
                <i class="fas fa-users fa-3x"></i>
                <h5>chauffaire</h5>
                </a>
            </li>
            <li  >
                <a href="{{route('buses.index')}}">
                    <i class="fas fa-bus fa-3x"></i>
                <h5>Buses</h5>
                </a>
            </li>
            <li  >
                <a href="{{route('clients.index')}}">
                    <i class="fas fa-users fa-3x"></i>
                    <h5>Client</h5>
                </a>
            </li>
            <li  >
                <a href="{{route('coulies.index')}}">
                    <i class="fas fa-boxes fa-3x"></i>
                <h5>colis  </h5>
                </a>
            </li>
            <li  >
                <a href="{{route('trajets.index')}}">
                    <i class="fas fa-road fa-3x"></i>
                <h5>Trajets</h5>
                </a>
            </li>
            <li  >
                <a href="{{route('billets.index')}}">

                        <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>

                <h5>Billets</h5>
                </a>
            </li>
            <li  >
              <a href="#">
                  <i class="fas fa-user "></i>
              <h5>Utilisateur </h5>
              </a>
          </li>


        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">


          <div class="collapse navbar-collapse justify-content-end" id="navigation">

            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="now-ui-icons users_single-02"></i>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">

    </div>

             <div class="content">

                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Agence::count()}} Agences</h5>
                          <i class="fas fa-users fa-3x"></i>
                          <a href="{{url('agences')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Chauffeur::count()}} Chauffeurs</h5>
                          <i class="fas fa-users fa-3x"></i>
                          <a href="{{url('chauffeurs')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Bus::count()}} Buses</h5>
                          <i class="fas fa-bus fa-3x"></i>
                          <a href="{{url('buses')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Billet::count()}} Billets</h5>
                          <span class="fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
                          </span>
                          <a href="{{url('billets')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Client::count()}} Clients</h5>
                          <i class="fas fa-users fa-3x"></i>
                          <a href="{{url('clients')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Coulie::count()}} Colis</h5>
                          <i class="fas fa-boxes fa-3x"></i>
                          <a href="{{url('coulies')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title">{{\App\Models\Trajet::count()}} Trajets</h5>
                          <i class="fas fa-road fa-3x"></i>
                          <a href="{{url('trajets')}}" class="stretched-link"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                    </div>
                  </div>
              </div>

      </div>

    </div>

</div>

    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>
