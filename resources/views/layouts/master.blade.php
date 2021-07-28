<!-- teks statis -->
<?php
    // head
    $tittle = "Sistem Penilaian";

    // fitur name
    $nama_menu_1 = "Beranda";
    $nama_menu_2 = "Akun Pengguna";
    $nama_menu_3 = "Kelas";
    $nama_menu_4 = "Input Nilai";
    $nama_menu_5 = "Variabel Praktik";
    $nama_menu_6 = "Rekap Nilai";
    $nama_menu_7 = "Pengaturan";

    // icon menu
    $icon_menu_1 = "home";
    $icon_menu_2 = "user";
    $icon_menu_3 = "graduation-cap";
    $icon_menu_4 = "award";
    $icon_menu_5 = "award";
    $icon_menu_6 = "file-alt";
    $icon_menu_7 = "sliders-h";

    //link routes
    $link_menu_1 = "/beranda";
    $link_menu_2 = "/akun-siswa";
    $link_menu_3 = "/kelas";
    $link_menu_4 = "/admin/soal";
    $link_menu_5 = "/nilai";
    $link_menu_6 = "/history";
    $link_menu_7 = "/pengaturan";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{$tittle}} | @yield('sub_tittle')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{asset('assets/dist/logo.png')}}" type="image/png">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        @yield('boostrap')        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                

                <!-- SEARCH FORM -->
                @yield('search')
                

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <!-- PRINT BUTTON -->
                        @yield('print')
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Pengaturan Akun" href="{{$link_menu_7}}">
                            <i class="fas fa-user-cog"></i>
                            <!-- <span class="badge badge-danger navbar-badge">3</span> -->
                        </a>
                    </li>
                    <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-th-large"></i>
                                <!-- <span class="badge badge-danger navbar-badge">3</span> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="dropdown-item">
                                <div class="media">
                                    <img src="{{Auth::user()->getFoto()}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                        {{Auth::user()->name}}
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                        </h3>
                                        <p class="text-sm">XII Multimedia</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            
                            <div class="dropdown-divider"></div>
                                <!-- <a href="/" class="dropdown-item dropdown-footer">
                                    Logout
                                </a> -->
                                <a class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar -->
                <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{Auth::user()->getFoto()}}"" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <?php
                        $name = Auth::user()->name;
                        $name = explode(" ",$name);
                    ?>
                    <a href="#" class="d-block">{{$name[0]}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{$link_menu_1}}" class="nav-link @yield('menu_1')">
                            <i class="nav-icon fas fa-{{$icon_menu_1}}"></i>
                            <p>
                                {{$nama_menu_1}}
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{$link_menu_2}}" class="nav-link @yield('menu_2')">
                            <i class="nav-icon fas fa-{{$icon_menu_2}}"></i>
                            <p>
                                @if(Auth::user()->status == 'Siswa')
                                Pengguna
                                @else
                                {{$nama_menu_2}}
                                @endif
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{$link_menu_3}}" class="nav-link  @yield('menu_3')">
                            <i class="nav-icon fas fa-{{$icon_menu_3}}"></i>
                            <p>
                                {{$nama_menu_3}}
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{$link_menu_4}}" class="nav-link  @yield('menu_4')">
                            <i class="nav-icon fas fa-{{$icon_menu_4}}"></i>
                            <p>
                                {{$nama_menu_4}}
                            </p>
                            </a>
                        </li> -->
                        @if(Auth::user()->status != 'Siswa')
                        <li class="nav-item">
                            <a href="{{$link_menu_5}}" class="nav-link  @yield('menu_5')">
                            <i class="nav-icon fas fa-{{$icon_menu_5}}"></i>
                            <p>
                                {{$nama_menu_5}}
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="{{$link_menu_6}}" class="nav-link  @yield('menu_6')">
                            <i class="nav-icon fas fa-{{$icon_menu_6}}"></i>
                            <p>
                                {{$nama_menu_6}}
                            </p>
                            </a>
                        </li> -->
                        @endif
                        <li class="nav-item">
                            <a href="{{$link_menu_7}}" class="nav-link  @yield('menu_7')">
                            <i class="nav-icon fas fa-{{$icon_menu_7}}"></i>
                            <p>
                                {{$nama_menu_7}}
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- /.content-wrapper -->

            @include('includes.footer')

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
        <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('dist/js/demo.js')}}"></script>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        @yield('script')
        <!-- <script>
            $('.logout-confirm').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Apakah anda yakin keluar ?',
                    // text: 'Akun yang sudah dihapus tidak bisa di onlinekan kembali',
                    icon: 'warning',
                    buttons: ["Batalkan", "Keluar"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
        </script> -->
    </body>
</html>
