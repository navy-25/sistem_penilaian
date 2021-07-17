
@extends('layouts.master')
<?php
    // fitur name
    $nama_menu_1 = "Beranda";
    $nama_menu_2 = "Akun Siswa";
    $nama_menu_3 = "Kelas";
    $nama_menu_4 = "Soal";
    $nama_menu_5 = "Variabel Praktik";
    $nama_menu_6 = "Rekab Nilai";

    // icon menu
    $icon_menu_1 = "home";
    $icon_menu_2 = "user";
    $icon_menu_3 = "graduation-cap";
    $icon_menu_4 = "question";
    $icon_menu_5 = "book";
    $icon_menu_6 = "file-alt";

    // head
    $tittle = "Sistem Penilaian";
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
                        Siswa yang tidak terdaftar kelas tidak bisa iku praktik.
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="card" style="margin:10px">                   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>
                                        <center>
                                            Status
                                        </center>    
                                    </th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">M. Nafi' Maula Hakim</td>
                                    <td>
                                        <center>
                                            <i class="fas fa-check"></i>
                                        </center>    
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#play_praktik">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#feedback_praktik">
                                            <i class="fas fa-comments"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">Widya Rizka Ulul Fadilah</td>
                                    <td>
                                        <center>
                                            <i class="fas fa-check"></i>
                                        </center>    
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#play_praktik">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#feedback_praktik">
                                            <i class="fas fa-comments"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td data-bs-toggle="modal" data-bs-target="#soal_add">Rizky Arifiyantini</td>
                                    <td>
                                        <center>
                                            <i class="fas fa-times"></i>
                                        </center>    
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#play_praktik">
                                            <i class="fas fa-play"></i>
                                        </button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#feedback_praktik">
                                            <i class="fas fa-comments"></i>
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
            <div class="col-md-5">
                <div class="card bg-light card-primary card-outline" style="margin:10px">   
                    <div class="card-header text-muted border-bottom-0">
                        <!-- 2 Hari lagi -->
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>PHP Programming</b></h2>
                                <p class="text-muted text-sm">Prof. Dr. Muhammad Nafi' Maula Hakim, S.Kom, M.Kom</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-book mr-1"></i></span> 
                                        Modul &nbsp;&nbsp;&nbsp; : Foto & Sinematografi
                                    </li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-person-booth mr-1"></i></span> 
                                        Praktik &nbsp;&nbsp;: Praktik Angle Foto
                                    </li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{asset('../../dist/img/user1-128x128.jpg')}}" alt="" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">                            
                            <div class="col-4" style="padding:2px">
                                <a href="/admin/kelas/nama-kelas/kelola" class="btn btn-sm btn-success" style="width:100%">
                                    <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp; Lihat Kelas
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="play_praktik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Variabel Praktik</h5>
            </div> -->
            <form role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label >1. Cara pengambilan gambar*</label>
                        <input type="range" min="1" max="5" step="1" class="form-control">
                        <div class="row">
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    E   
                                </p>
                            </div>
                            <div class="col-2" >
                                <p align="right" style="padding-right:15px">
                                    D   
                                </p>     
                            </div>
                            <div class="col-4">
                                <center>
                                    C
                                </center>    
                            </div>
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    B   
                                </p>
                            </div>
                            <div class="col-2">
                                <p align="right" style="padding-right:15px">
                                    A
                                </p>
                            </div>
                            <!-- <textarea class="form-control" rows="2" placeholder="Catatan untuk siswa"></textarea> -->
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label >2. Penguasaan kamera*</label>
                        <input type="range" min="1" max="5" step="1" class="form-control">
                        <div class="row">
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    E   
                                </p>
                            </div>
                            <div class="col-2" >
                                <p align="right" style="padding-right:15px">
                                    D   
                                </p>     
                            </div>
                            <div class="col-4">
                                <center>
                                    C
                                </center>    
                            </div>
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    B   
                                </p>
                            </div>
                            <div class="col-2">
                                <p align="right" style="padding-right:15px">
                                    A
                                </p>
                            </div>
                            <!-- <textarea class="form-control" rows="2" placeholder="Catatan untuk siswa"></textarea> -->
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label >3. Penguasaan Lokasi*</label>
                        <input type="range" min="1" max="5" step="1" class="form-control">
                        <div class="row">
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    E   
                                </p>
                            </div>
                            <div class="col-2" >
                                <p align="right" style="padding-right:15px">
                                    D   
                                </p>     
                            </div>
                            <div class="col-4">
                                <center>
                                    C
                                </center>    
                            </div>
                            <div class="col-2">
                                <p align="left" style="padding-left:15px">
                                    B   
                                </p>
                            </div>
                            <div class="col-2">
                                <p align="right" style="padding-right:15px">
                                    A
                                </p>
                            </div>
                            <!-- <textarea class="form-control" rows="2" placeholder="Catatan untuk siswa"></textarea> -->
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea class="form-control" rows="2" placeholder="Catatan untuk siswa"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success confirm">Finish</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="feedback_praktik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Variabel Praktik</h5>
            </div> -->
            <form role="form">
                <div class="modal-body">
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Referensi materi</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" placeholder="materi-modul.com/tentang-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" placeholder="materi-modul.com/angle-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" placeholder="materi-modul.com/teknis-foto">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Tutorial Youtube</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" placeholder="results?search_query=teknik-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" placeholder="results?search_query=teknik-foto">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea class="form-control" rows="2" placeholder="Catatan untuk siswa"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success confirm">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Modal feedback -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Apakah anda yakin ?',
            text: 'Cek kembali nilai yang diinputkan',
            icon: 'warning',
            buttons: ["Batalkan", "Selesaikan"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection
