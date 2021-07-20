
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
{{$nama_menu_3}} - Nama Mata pelajaran
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
                    <h1 >Kelas Multimedia</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{$link_menu_1}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{$link_menu_3}}">{{$nama_menu_3}}</a></li>
                        <li class="breadcrumb-item active">{{$kelas->name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card" style="margin:10px">
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/update">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Kelas/Mata Pelajaran*</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$kelas->name}}" placeholder="Nama Kelas/Mata Pelajaran">
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="form-group">
                                <label >Guru/Pengajar/Pembimbing*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select class="form-control" name="pembimbing"  id="inputGroupSelect01">
                                    <?php
                                        $pembimbing = \App\Models\User::find($kelas->pembimbing);
                                    ?>
                                    <option value="{{$pembimbing->id}}" selected>{{$pembimbing->name}}</option>
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
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Status Kelas*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select name="status" class="form-control" id="inputGroupSelect01">
                                    <option value="{{$kelas->status}}" selected>{{$kelas->status}}</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="nonaktif">Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Hari*</label>
                                <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                                <select name="hari" class="form-control">
                                    <option value="{{$kelas->hari}}" selected>{{$kelas->hari}}</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <?php
                            $jam = $kelas->jam;
                            $jam = explode(" - ",$jam);
                            $jam_mulai = $jam[0];
                            $jam_selesai = $jam[1];
                        ?>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Jam Mulai*</label>
                                <input name="jam_mulai" type="time" class="form-control" value="{{$jam_mulai}}">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label >Jam Selesai*</label>
                                <input name="jam_selesai" type="time" class="form-control" value="{{$jam_selesai}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{$link_menu_3}}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning">Perbarui</button>
                </div>
            </form>
        </div>
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
            title: 'Hapus kelas ?',
            text: 'Kelas yang sudah dihapus tidak bisa di onlinekan kembali',
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