
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
    <section class="content-header" style="padding-bottom:0px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Informasi !</h5>
                        Masukkan nilai setiap siswa sesuai standar penilaian yang telah disusun oleh guru/pembimbing.
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="margin:10px">                   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tugas</th>
                                    <th>Nilai</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">Muhammad Nafi' Maula Hakim</td>
                                    <td>
                                        <a href=""> 
                                            tugas-multimedia-nafi.pdf
                                        </a>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <button title="Beri Nilai" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#soal_add">
                                            <i class="fas fa-award"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">Widya Rizka Ulul Fadilah</td>
                                    <td>
                                        <a href=""> 
                                            tugas-multimedia-riska.pdf
                                        </a>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <button title="Beri Nilai" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#soal_add">
                                            <i class="fas fa-award"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">Rizky Arifiyantini</td>
                                    <td>
                                        <a href=""> 
                                            tugas-multimedia-arin.pdf
                                        </a>
                                    </td>
                                    <td>A</td>
                                    <td>
                                        <button title="Update Nilai" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#soal_add">
                                            <i class="fas fa-award"></i>
                                        </button>
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
            </div>
            <div class="col-md-3">
                <div class="card" style="margin:10px">
                    <div class="card-header" style="padding:10px">
                        Keterangan Nilai :
                    </div>
                    <div class="card-body" style="padding:10px">
                        <table class="table table-bordered text-nowrap">
                            <thead>
                                <tr>
                                    <th style="width:10px">No</th>
                                    <th style="width:20px">Nilai</th>
                                    <th>Angka</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>A</td>
                                    <td>80 - 100</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>B</td>
                                    <td>60 - 69</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>C</td>
                                    <td>50 - 59</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>D</td>
                                    <td>70 - 79</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>E</td>
                                    <td>< 49</td>
                                </tr>
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->


<!-- Modal -->
<div class="modal fade" id="soal_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Berikan Nilai</h5>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <a class="btn btn-danger" style="width:100%;margin-bottom:10px" href="">
                            E
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-danger" style="width:100%;margin-bottom:10px;background:#dc7335" href="">
                            D
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-warning" style="width:100%;margin-bottom:10px;color:white" href="">
                            C
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-success" style="width:100%;margin-bottom:10px;background:#5fa728" href="">
                            B
                        </a>
                    </div>
                    <div class="col">
                        <a class="btn btn-success" style="width:100%;margin-bottom:10px" href="">
                            A
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
