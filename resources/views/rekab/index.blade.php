
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

    // head
    $tittle = "Sistem Penilaian";
?>

@section('menu_6')
active
@endsection

@section('sub_tittle')
{{$nama_menu_6}}
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
        <!-- Default box -->
        <div class="card collapsed-card" style="margin:10px;margin-top:0px">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-search" style="margin-right:10px;font-size:15px"></i>Filter Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="font-weight: 500;">Pilih Kelas</label>
                            <select class="form-control">
                                <option selected>Semua Kelas</option>
                                <option>X</option>
                                <option>XI</option>
                                <option>XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="font-weight: 500;">Pilih Jurusan</label>
                            <select class="form-control">
                                <option selected>Semua Jurusan</option>
                                <option>Multimedia</option>
                                <option>Sepeda Motor</option>
                                <option>Akuntansi</option>
                                <option>Perkantoran</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="font-weight: 500;">Pilih Modul</label>
                            <select class="form-control">
                                <option selected>Semua Modul</option>
                                <option>Editing</option>
                                <option>Fotografi</option>
                                <option>Bongkar Mesin</option>
                                <option>Buku Khas Kecil</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="font-weight: 500;">Pilih Nilai</label>
                            <select class="form-control">
                                <option selected>Semua Nilai</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                                <option>D</option>
                                <option>E</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="font-weight: 500;">Pilih Status</label>
                            <select class="form-control">
                                <option selected>Semua Status</option>
                                <option>Lulus</option>
                                <option>Remedi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button type="button" class="btn btn-primary" style="margin-top:30px">
                                <i class="fas fa-search mr-1"></i> Cari
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
    <section class="content">
        <div class="card" style="margin:10px;margin-top:0px">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width:10px">ID</th>
                            <th style="width:40px">Foto</th>
                            <th>Nama Lengkap</th>
                            <th style="width:200px">Modul</th>
                            <th style="width:200px">Tugas</th>
                            <th style="width:600px">Nilai</th>
                            <th style="width:10px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:10px">1</td>
                            <td style="width:40px">
                                <a href="/admin/akun-siswa/nama-siswa">
                                    <img src="../../dist/img/user2-160x160.jpg" width="40px" alt="nama_siswa">
                                </a>
                            </td>
                            <td>
                                <a href="/admin/akun-siswa/nama-siswa" style="text-decoration:none;color:black">
                                    Muhammad Nafi' Maula Hakim
                                    <small>
                                        <br>
                                        XI Multimedia
                                    </small>
                                </a>
                            </td>
                            <td>
                                <a href="http://localhost:8000/admin/kelas/nama-kelas/kelola" style="text-decoration:none;color:black">
                                    <i class="fas fa-book mr-1"></i> Nama Modul
                                </a>
                            </td>
                            <td>
                                Tugas Review Materi
                            </td>
                            <td>
                                <small style="background:green;padding:3px;color:white">
                                    A (Lulus)
                                </small> 
                            </td>
                            <td style="width:10px">
                                <a href="/admin/kelas/nama-kelas/kelola/nilai" title="Ubah Nilai" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-award"></i>
                                </a>
                                <a href="" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                    <i class="fas fa-trash"></i>
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
        </div>
    </section>
@endsection
@section('script')
<!-- Modal feedback -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Hapus akun siswa ?',
            text: 'Akun yang sudah dihapus tidak bisa di onlinekan kembali',
            icon: 'warning',
            buttons: ["Batalkan", "Hapus"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection