
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

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-bottom:0px">
    </section>

    <!-- /.content -->
    <section class="content">
        <div class="card" style="margin:10px;margin-top:0px">
        <div class="card-header">
                <h3 class="card-title">Nilai Praktik</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th style="width:40px">Foto</th>
                            <th>Nama Lengkap</th>
                            <th style="width:200px">Praktik</th>
                            <th style="width:600px">Nilai</th>
                            <th style="width:10px">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach ($Kontributor_Kelas as $k)
                            @if($k->id_kelas == $kelas->id)
                                <?php
                                    $siswa = \App\Models\User::find($k->id_siswa);
                                ?>
                            <tr>
                                <td style="width:10px">{{$no++}}</td>
                                <td style="width:40px">
                                    <a href="{{$siswa->getFoto()}}">
                                        <img src="{{$siswa->getFoto()}}" width="40px" alt="nama_siswa">
                                    </a>
                                </td>
                                <td>
                                    <a href="" style="text-decoration:none;color:black">
                                        {{$siswa->name}}
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
                                    <a href="" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
