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

    <!-- /.content -->
    <section class="content">
        <div class="card" style="margin:10px;margin-top:0px">
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th style="width:10px">No</th>
                            <th style="width:700px">Kelas</th>
                            <th style="width:200px">Jumlah Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach($kelas as $k)
                            @if(Auth::user()->status == "Admin")
                            <tr>
                                <td style="width:10px">{{$no++}}</td>
                                <td>
                                    <a href="/history/{{$k->id}}/{{$k->name}}" style="text-decoration:none;color:black">
                                        {{$k->name}}
                                    </a>
                                </td>
                                <td>
                                    <?php
                                        $KK = \App\Models\Kontributor_Kelas::all();
                                        $jumlah_siswa = 0;
                                        foreach ($KK as $kk){
                                            if ($kk->id_kelas == $k->id){
                                                $jumlah_siswa = $jumlah_siswa+1;
                                            }
                                        }
                                    ?>
                                    {{$jumlah_siswa}}
                                </td>
                            </tr>
                            @elseif(Auth::user()->status == "Guru")
                                @if($k->pembimbing == Auth::user()->id)
                                <tr>
                                    <td style="width:10px">{{$no++}}</td>
                                    <td>
                                        <a href="/history/{{$k->id}}/{{$k->name}}" style="text-decoration:none;color:black">
                                            {{$k->name}}
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                            $KK = \App\Models\Kontributor_Kelas::all();
                                            $jumlah_siswa = 0;
                                            foreach ($KK as $kk){
                                                if ($kk->id_kelas == $k->id){
                                                    $jumlah_siswa = $jumlah_siswa+1;
                                                }
                                            }
                                        ?>
                                        {{$jumlah_siswa}}
                                    </td>
                                </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </section>
@endsection
