
@extends('layouts.master')
<!-- teks statis -->
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

@section('menu_5')
active
@endsection

@section('sub_tittle')
{{$nama_menu_5}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-bottom: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row" style="margin-left:5px">
                        <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-award mr-1"></i> Tambah Variabel Praktik
                        </button>
                    </div>
                </div>               
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card" style="margin:10px">
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width:10px">ID</th>
                            <th>Modul Praktik</th>
                            <th>Praktik</th>
                            <th style="width:10px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width:10px">1</td>
                            <td>
                                <a href="/admin/akun-siswa/nama-siswa" style="text-decoration:none;color:black">
                                    Foto & Sinematografi
                                </a>
                            </td>
                            <td>Fotografi</td>
                            <td style="width:10px">
                                <a href="" title="Tambah Variabel Nilai" class="btn btn-success btn-sm">
                                    <i class="fas fa-th-list"></i>
                                </a>
                                <a href="" title="Ubah Data Modul" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-pen"></i>
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
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
<!-- Modal feedback -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Hapus modul praktik ?',
            text: 'Modul yang sudah dihapus tidak bisa di onlinekan kembali',
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