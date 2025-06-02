<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Calendar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-daygrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-timegrid/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fullcalendar-bootstrap/main.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />

    <!-- Estilos do Bootstrap (opcional) -->
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css' rel='stylesheet' />

    <!-- Biblioteca jQuery -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

    <!-- Biblioteca do FullCalendar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>

    <!-- Biblioteca de interação do FullCalendar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/interaction.min.js'></script>

    <!-- Biblioteca Draggable do FullCalendar -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/draggable.min.js'></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item dropdown user-menu">

                    {{-- User menu toggler --}}
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if (config('adminlte.usermenu_image'))
                            <img src="{{ Auth::user()->adminlte_image() }}" class="user-image img-circle elevation-2"
                                alt="{{ Auth::user()->name }}">
                        @endif
                        <span @if (config('adminlte.usermenu_image')) class="d-none d-md-inline" @endif>
                            {{ Auth::user()->name }}
                        </span>
                    </a>

                    {{-- User menu dropdown --}}
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        {{-- User menu header --}}
                        @if (!View::hasSection('usermenu_header') && config('adminlte.usermenu_header'))
                            <li
                                class="user-header {{ config('adminlte.usermenu_header_class', 'bg-primary') }}
                @if (!config('adminlte.usermenu_image')) h-auto @endif">
                                @if (config('adminlte.usermenu_image'))
                                    <img src="{{ Auth::user()->adminlte_image() }}" class="img-circle elevation-2"
                                        alt="{{ Auth::user()->name }}">
                                @endif
                                <p class="@if (!config('adminlte.usermenu_image')) mt-0 @endif">
                                    {{ Auth::user()->name }}
                                    @if (config('adminlte.usermenu_desc'))
                                        <small>{{ Auth::user()->adminlte_desc() }}</small>
                                    @endif
                                </p>
                            </li>
                        @else
                            @yield('usermenu_header')
                        @endif

                        {{-- Configured user menu links --}}


                        {{-- User menu body --}}
                        @hasSection('usermenu_body')
                            <li class="user-body">
                                @yield('usermenu_body')
                            </li>
                        @endif

                        {{-- User menu footer --}}
                        <li class="user-footer">
                            @php($logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout'))
                            @php($profile_url = View::getSection('profile_url') ?? config('adminlte.profile_url', 'logout'))

                            @if (config('adminlte.usermenu_profile_url', false))
                                @php($profile_url = Auth::user()->adminlte_profile_url())
                            @endif

                            @if (config('adminlte.use_route_url', false))
                                @php($profile_url = $profile_url ? route($profile_url) : '')
                                @php($logout_url = $logout_url ? route($logout_url) : '')
                            @else
                                @php($profile_url = $profile_url ? url($profile_url) : '')
                                @php($logout_url = $logout_url ? url($logout_url) : '')
                            @endif
                            @if ($profile_url)
                                <a href="{{ $profile_url }}"
                                    class="nav-link btn btn-default btn-flat d-inline-block">
                                    <i class="fa fa-fw fa-user text-lightblue"></i>
                                    {{ __('adminlte::menu.profile') }}
                                </a>
                            @endif
                            <a class="btn btn-default btn-flat float-right @if (!$profile_url) btn-block @endif"
                                href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off text-red"></i>
                                {{ __('adminlte::adminlte.log_out') }}
                            </a>
                            <form id="logout-form" action="{{ $logout_url }}" method="POST"
                                style="display: none;">
                                @if (config('adminlte.logout_method'))
                                    {{ method_field(config('adminlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../index3.html" class="brand-link">
                <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    Funcionários
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('employees-show') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Funcionários</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('employees-form') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cadastro de funcionário</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    Serviçoes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('service-show') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Serviços</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('service-form') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cadastro de serviço</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('service-form') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Cadastro de categoria</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendário
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('calendar-show') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Calendário</p>
                                    </a>
                                </li>                               
                              
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{Route('calendar-show')}}" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendário
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a>
                        </li> --}}

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
