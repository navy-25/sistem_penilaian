
@extends('layouts.master')
<!-- teks statis -->
<?php
    // fitur name
    $nama_menu_1 = "Beranda";
    $nama_menu_2 = "Akun Siswa";
    $nama_menu_3 = "Kelas";
    $nama_menu_4 = "Soal";
    $nama_menu_5 = "SOP Nilai";
    $nama_menu_6 = "Rekab Nilai";

    // icon menu
    $icon_menu_1 = "home";
    $icon_menu_2 = "user";
    $icon_menu_3 = "graduation-cap";
    $icon_menu_4 = "question";
    $icon_menu_5 = "book";
    $icon_menu_6 = "file-alt";

    //link routes
    $link_menu_1 = "/admin/beranda";
    $link_menu_2 = "/admin/akun-siswa";
    $link_menu_3 = "/admin/kelas";
    $link_menu_4 = "/admin/soal";
    $link_menu_5 = "/admin/nilai";
    $link_menu_6 = "/admin/nilai";
?>

@section('menu_1')
active
@endsection

@section('sub_tittle')
{{$nama_menu_1}}
@endsection

@section('boostrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection

@section('content')
    <!-- Main content -->
    <section class="content" style="padding:10px">
        <!-- Default box -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset('../banner/001.jpg')}}" style="border-radius:20px;" width="100%" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5> -->
                        <!-- <p>Some representative placeholder content for the first slide.</p> -->
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('../banner/002.jpg')}}" style="border-radius:20px;" width="100%" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5> -->
                        <!-- <p>Some representative placeholder content for the second slide.</p> -->
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('../banner/003.jpg')}}" style="border-radius:20px;" width="100%" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5> -->
                        <!-- <p>Some representative placeholder content for the second slide.</p> -->
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
        <!-- /.card -->
    </section>
    <?php
        $user = \App\Models\User::all();
        $jumlah_guru = 0;
        $jumlah_admin = 0;
        $jumlah_siswa = 0;
        foreach ($user as $x){
            if($x->status == "Siswa"){
                $jumlah_siswa = $jumlah_siswa + 1;
            }elseif($x->status == "Guru"){
                $jumlah_guru = $jumlah_guru + 1;
            }else{
                $jumlah_admin = $jumlah_admin + 1;
            }
        }
        $all =  $jumlah_siswa + $jumlah_guru;
    ?>
    <div class="row" style="padding:10px">
        <div class="col-xl-4">
            <div class="info-box mb-3 bg-primary">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Seluruh Pengguna</span>
                    <span class="info-box-number">{{$all}} orang</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Guru</span>
                    <span class="info-box-number">{{$jumlah_guru}} orang</span>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-graduation-cap"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Siswa</span>
                    <span class="info-box-number">{{$jumlah_siswa}} orang</span>
                </div>
            </div>
        </div>
    </div>
@endsection