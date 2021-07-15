
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
        <div class="col-sm-6">
            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modul_add">
                <i class="fas fa-book mr-1"></i>Modul
            </button>
            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#soal_add">
                <i class="fas fa-tasks mr-1"></i>Tugas
            </button>
        </div>
        <!-- <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
            <li class="breadcrumb-item"><a href="{{$link_menu_1}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{$link_menu_3}}">{{$nama_menu_3}}</a></li>
            <li class="breadcrumb-item active">Multimedia</li>
            </ol>
        </div> -->
    </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#modul" data-toggle="tab">Modul</a></li>
                    <li class="nav-item"><a class="nav-link" href="#praktik" data-toggle="tab">Praktik</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontributor" data-toggle="tab">Kontributor</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="active tab-pane" id="modul">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td align="left">001. Materi Editing dan Angle Kamera 
                                        <small style="background:yellow;padding:3px">
                                                Materi
                                        </small>    
                                        </td>
                                        <td align="right">
                                            <a href="" title="Download" class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                            <a href="" title="Hapus Modul/Tugas" class="btn btn-danger btn-sm delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">002. Adobe Primier
                                            <small style="background:yellow;padding:3px">
                                                    Materi
                                            </small> 
                                        </td>
                                        <td align="right">                                          
                                            <a href="" title="Download" class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                            <a href="" title="Hapus Modul/Tugas" class="btn btn-danger btn-sm delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">003. Tugas Review Materi
                                            <small style="background:red;padding:3px;color:white">
                                                    Tugas
                                            </small> 
                                        </td>
                                        <td align="right">
                                            <a href="/admin/kelas/nama-kelas/kelola/nilai" title="Upload Tugas" class="btn btn-outline-primary btn-sm">
                                                <i class="fas fa-upload"></i>
                                            </a>
                                            <a href="/admin/kelas/nama-kelas/kelola/nilai" title="Input Nilai" class="btn btn-success btn-sm">
                                                <i class="fas fa-award"></i>
                                            </a>
                                            <a href="" title="Download" class="btn btn-primary btn-sm">
                                                <i class="fas fa-file-download"></i>
                                            </a>
                                            <a href="" title="Hapus Modul/Tugas" class="btn btn-danger btn-sm delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <ul class="pagination pagination-sm m-0 float-left">
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">»</a></li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="praktik">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <tr>
                                        <td align="left">001. Praktik Angle Foto</td>
                                        <td align="right">
                                            <!-- <a href="" title="Hapus Akun Siswa" class="btn btn-secondary btn-sm stop-confirm">
                                                <i class="fas fa-stop mr-1"></i>Stop
                                            </a> -->
                                            <a href="" title="Hapus Akun Siswa" class="btn btn-success btn-sm">
                                                <i class="fas fa-play mr-1"></i>Mulai penilaian
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <ul class="pagination pagination-sm m-0 float-left">
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">»</a></li>
                        </ul>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="kontributor">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Muhammad Nafi' Maula Hakim</td>
                                    <td>XI Multimedia</td>
                                    <td>Siswa</td>
                                    <td>
                                        <a href="" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Widya Rizka Ulul Fadilah</td>
                                    <td>XI Multimedia</td>
                                    <td>Siswa</td>
                                    <td>
                                        <a href="" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Rizky Arifiyantini</td>
                                    <td>XI Multimedia</td>
                                    <td>Siswa</td>
                                    <td>
                                        <a href="" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <a href="{{asset('../../dist/img/user2-160x160.jpg')}}" target="_blank" title="Foto Profil">
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{asset('../../dist/img/user2-160x160.jpg')}}" alt="User profile picture">
                    </a>
                </div>

                <h3 class="profile-username text-center">Multimedia</h3>
                <p class="text-muted text-center"><b>Oleh : </b> Prof. Dr. Muhammad Nafi' Maula Hakim, S.Kom, M.Kom</p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp; : Selasa</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;: 10.00 - 11.00</li>
                </ul>
                <hr>
                <small>
                    <a href="" class="btn btn-success btn-sm" style="width:100%"> <i class="fas fa-sms mr-2"></i>Join Grup Whatsapp</a>
                </small>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="modul_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Modul Pembelajaran</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label >Judul Modul/Materi*</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Judul Modul Pembelajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Materi</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="soal_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Tugas</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label >Judul Tugas*</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Judul Tugas Pembelajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Tugas</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-success">Upload</button>
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
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Hapus materi modul ?',
            text: 'File yang sudah dihapus tidak bisa di onlinekan kembali',
            icon: 'warning',
            buttons: ["Batalkan", "Hapus"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
<script>
    $('.stop-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Stop penilaian praktik ?',
            text: 'Penilaian praktek yang di stop tidak bisa di onlinekan kembali',
            icon: 'warning',
            buttons: ["Batalkan", "Stop"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection
