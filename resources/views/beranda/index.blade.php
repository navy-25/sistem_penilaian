
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
    <section class="content" style="padding:5px">
        <!-- Default box -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="{{asset('../banner/001.jpg')}}" style="border-radius:20px" width="100%" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>First slide label</h5> -->
                        <!-- <p>Some representative placeholder content for the first slide.</p> -->
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('../banner/002.jpg')}}" style="border-radius:20px" width="100%" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <!-- <h5>Second slide label</h5> -->
                        <!-- <p>Some representative placeholder content for the second slide.</p> -->
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="{{asset('../banner/003.jpg')}}" style="border-radius:20px" width="100%" class="d-block w-100" alt="...">
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
    <!-- <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch">
                <div class="card bg-light card-primary card-outline" style="width:100%">
                    <div class="card-header text-muted border-bottom-0">
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>PHP Programming</b></h2>
                                <p class="text-muted text-sm">Prof. Dr. Muhammad Nafi' Maula Hakim, S.Kom, M.Kom</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp; : Selasa</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;: 10.00 - 11.00</li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-2">
                                <a href="#" class="btn btn-sm bg-danger delete-confirm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-2" style="padding:2px">
                                <a href="/admin/kelas/nama-kelas" class="btn btn-sm btn-secondary" style="width:100%">
                                    <i class="fas fa-cog"></i>
                                </a>
                            </div>
                            <div class="col-4" style="padding:2px">
                                <a href="/admin/kelas/nama-kelas/kelola" class="btn btn-sm btn-success" style="width:100%">
                                    <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp; Masuk
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /.card-body -->
    <!-- /.content -->
@endsection