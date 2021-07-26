
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

@section('menu_5')
active
@endsection

@section('sub_tittle')
{{$nama_menu_5}}
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
                <div class="col-sm-6">
                    <div class="row" style="margin-left:5px">
                        <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-plus mr-1"></i> Variabel Penilaian
                        </button>
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
                                    <th>Variabel Penilaian</th>
                                    <!-- <th>Aspek</th> -->
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // dd($sub_variabel_praktik);
                                    $no = 1; 
                                ?>
                                @foreach($sub_variabel_praktik as $s)
                                    @if($s->id_variabel_praktik == $variabel_praktik->id)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>
                                            <!-- /nilai/{{$s->id_variabel_praktik}}/{{$variabel_praktik->name}}/{{$s->id}}/destroy -->
                                            <a href="/nilai/{{$s->id_variabel_praktik}}/{{$variabel_praktik->name}}/{{$s->id}}/destroy" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-left">
                        <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" style="border-radius:100px;margin:2px;width:25px;color:grey" href="#">»</a></li>
                        </ul>
                    </div> -->
                    <!-- /.card-footer-->
                </div>
            </div>
            <div class="col-md-5">
                <!-- <div class="card" style="margin:10px">
                    <div class="card-header" style="padding:10px">
                        Keterangan :
                    </div>
                    <div class="card-body" style="padding:10px">
                        <small>Nama Modul Praktik</small>
                        <p><b>Foto & Sinematografi</b></p>
                        <small>Modul Praktik</small>
                        <p><b>Praktik Angle Foto</b></p>
                        <small>Pembimbing</small>
                        <p><b>Muhammad Nafi' Maula Hakim</b></p>
                    </div>
                </div> -->
                <div class="card bg-light card-primary card-outline" style="margin:10px">   
                    <div class="card-header text-muted border-bottom-0">
                        <!-- 2 Hari lagi -->
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <?php
                                    $kelas = \App\Models\Kelas::find($variabel_praktik->id_kelas);
                                    $pembimbing = \App\Models\User::find($kelas->pembimbing);
                                ?>
                                <h2 class="lead"><b>{{$kelas->name}}</b></h2>
                                <p class="text-muted text-sm">{{$pembimbing->name}}</p>
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$kelas->hari}}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;&nbsp;&nbsp;: {{$kelas->jam}}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-person-booth mr-1"></i></span> 
                                        Praktik &nbsp;: <br> {{$variabel_praktik->name}}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{$pembimbing->getFoto()}}" alt="" class="img-circle img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">                            
                            <div class="col-4" style="padding:2px">
                                <a href="/kelas/{{$kelas->id}}/{{$kelas->name}}/masuk-kelas" class="btn btn-sm btn-success" style="width:100%">
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
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form role="form" method="POST" action="/nilai/{{$variabel_praktik->id}}/{{$variabel_praktik->name}}/store">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label >Variabel Penilaian*</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nama Variabel Penilaian">
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label >Deskripsi praktik</label>
                        <textarea class="form-control" rows="3" name="deskripsi" placeholder="Jelaskan & deskripsikan praktik ..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
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
            title: 'Hapus variabel penilaian ?',
            text: 'Variabel yang sudah dihapus tidak bisa di kembalikan',
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
    $('.hapus-confirm').on('click', function (event) {
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
