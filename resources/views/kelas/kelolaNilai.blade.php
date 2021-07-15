
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
@section('menu_3')
active
@endsection

@section('sub_tittle')
{{$nama_menu_3}}
@endsection

@section('print')
<a class="nav-link" title="Cetak data siswa">
    <i class="fas fa-file-archive"></i>
</a>
@endsection

@section('search')
<form class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- <div class="col-sm-6">
                    <h1>{{$nama_menu_2}}</h1>
                </div> -->
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{$link_menu_1}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{$link_menu_3}}">{{$nama_menu_3}}</a></li>
                        <li class="breadcrumb-item"><a href="{{$link_menu_3}}">Multimedia</a></li>
                        <li class="breadcrumb-item active">Nilai Tugas Review Materi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card" style="margin:10px">
            <!-- <div class="card-header">
                <h3 class="card-title">Title</h3>
                
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div> -->
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Tugas</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Muhammad Nafi' Maula Hakim</td>
                            <td>XI Multimedia</td>
                            <td>
                                <a href=""> 
                                    tugas-multimedia-nafi.pdf
                                </a>
                            </td>
                            <td>
                                <a href="" title="Beri Nilai" class="btn btn-success btn-sm">
                                    <i class="fas fa-award"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Widya Rizka Ulul Fadilah</td>
                            <td>XI Multimedia</td>
                            <td>
                                <a href=""> 
                                    tugas-multimedia-riska.pdf
                                </a>
                            </td>
                            <td>
                                <a href="" title="Beri Nilai" class="btn btn-success btn-sm">
                                    <i class="fas fa-award"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Rizky Arifiyantini</td>
                            <td>XI Multimedia</td>
                            <td>
                                <a href=""> 
                                    tugas-multimedia-arin.pdf
                                </a>
                            </td>
                            <td>
                                <a href="" title="Beri Nilai" class="btn btn-success btn-sm">
                                    <i class="fas fa-award"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-left">
                <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">«</a></li>
                <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">1</a></li>
                <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">2</a></li>
                <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">3</a></li>
                <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">»</a></li>
                </ul>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
