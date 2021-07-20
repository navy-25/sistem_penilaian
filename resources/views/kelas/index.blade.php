
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
    $link_menu_3 = "/kelas";
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
            <div class="row">
                <div class="col-sm-12">
                @if(Auth::user()->status != 'Siswa')
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check-circle"></i> Berhasil !</h5>
                            {{$message}}
                        </div>
                    @elseif ($message = Session::get('gagal'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal !</h5>
                            {{$message}}
                        </div>
                    @endif
                @endif
                </div>
            </div>
            @if(Auth::user()->status != 'Siswa')
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="row" style="margin-left:8px">
                        <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-chalkboard-teacher mr-1"></i>Buat Kelas
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <style>
        .card {
            background-color: #f4f6f9;
        }
    </style>
    <section class="content">
        <div class="card card-solid" style="box-shadow: 0 0 0px rgb(0 0 0 / 13%), 0 0px 0px rgb(0 0 0 / 20%);">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach($kelas as $x)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light card-primary card-outline" style="width:100%">
                                <div class="card-header text-muted border-bottom-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead" style="font-weight:800"><b>{{$x->name}}</b></h2>
                                            <?php
                                                $pembimbing = \App\Models\User::find($x->pembimbing);
                                            ?>
                                            <p class="text-muted text-sm">
                                                @if($x->status == 'aktif')
                                                <span style="background:yellow">
                                                @else
                                                <span style="background:red;color:white">
                                                @endif
                                                    kelas {{$x->status}} 
                                                </span>
                                                <br> 
                                                {{$pembimbing->name}}
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp; : {{$x->hari}}</li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;: {{$x->jam}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{$pembimbing->getFoto()}}" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        @if(Auth::user()->status != 'Siswa')
                                        <div class="col-2">
                                            <a href="{{$link_menu_3}}/{{$x->id}}/destroy" class="btn btn-sm bg-danger delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="col-4">

                                        </div>
                                        <div class="col-2" style="padding:2px">
                                            <a href="{{$link_menu_3}}/{{$x->id}}/{{$x->name}}" class="btn btn-sm btn-secondary" style="width:100%">
                                                <i class="fas fa-cog"></i>
                                            </a>
                                        </div>
                                        @endif
                                        <div class="col-4" style="padding:2px">
                                            <a href="{{$link_menu_3}}/{{$x->id}}/{{$x->name}}/masuk-kelas" class="btn btn-sm btn-success" style="width:100%">
                                                <i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp; Masuk
                                            </a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
    <!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Kelas Baru</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form class="form" method="POST" action="/kelas/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Kelas/Mata Pelajaran*</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label >Guru/Pengajar/Pembimbing*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select class="form-control" name="pembimbing"  id="inputGroupSelect01">
                                    <option selected>Pilih Guru/Pengajar</option>
                                    @foreach($user as $s)
                                        @if($s->role != 'admin')
                                            @if($s->status == 'Guru')
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label >Status Kelas*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select class="form-control" name="status"  id="inputGroupSelect01">
                                    <option selected>Pilih Status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label >Hari*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select name="hari" class="form-control">
                                    <option selected>Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label >Jam Mulai*</label>
                                <input type="time" name="jam_mulai" class="form-control" value="00:00">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label >Jam Selesai*</label>
                                <input type="time" name="jam_selesai" class="form-control" value="00:00">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
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
            title: 'Hapus kelas ?',
            text: 'Semua data yang berhubungan dengan kelas ini akan terhapus',
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