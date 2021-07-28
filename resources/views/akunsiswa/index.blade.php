
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
    $link_menu_2 = "/akun-siswa";
    $link_menu_3 = "/admin/kelas";
    $link_menu_4 = "/admin/soal";
    $link_menu_5 = "/admin/nilai";
    $link_menu_6 = "/nilai";
?>
@section('menu_2')
active
@endsection

@section('sub_tittle')
{{$nama_menu_2}}
@endsection

@section('print')
<!-- <a class="nav-link" title="Cetak data siswa">
    <i class="fas fa-file-archive"></i>
</a> -->
@endsection

@section('search')
<form class="form-inline ml-3">
    <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" name="cari" placeholder="Search" aria-label="Search">
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
    <section class="content-header" style="padding-bottom: 0px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
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
                </div>
            </div>
            @if(Auth::user()->status != 'Siswa')
            <div class="row">
                <div class="col-sm-12">
                    <div class="row" style="margin-left:1px">
                        <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-user mr-1"></i>Tambah
                        </button>
                    </div>
                </div>               
            </div>
            @endif
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
                            <th style="width:10px">No</th>
                            <th style="width:100px">Foto</th>
                            <th>Nama Lengkap</th>
                            @if(Auth::user()->status != 'Siswa')
                            <th style="width:10px">Opsi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                        ?>
                        @foreach($user as $x)
                        <?php
                            if($x->nis == Null){
                                $nis = '-';
                            }else{
                                $nis = $x->nis;
                            }
                            
                        ?>
                            @if($x->status != 'Admin')
                                @if($x->id != Auth::user()->id)
                                <tr>
                                    <td style="width:10px">{{$no++}}</td>
                                    <td style="width:100px">
                                        <a href="{{$link_menu_2}}/{{$x->id}}">
                                            <img src="{{$x->getFoto()}}" width="70px" alt="nama_siswa">
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                            $Kelas_User = \App\Models\Kelas_User::all();
                                            for ($i=0;$i<count($Kelas_User);$i++){
                                                if($Kelas_User[$i]->id_siswa == $x->id){
                                                    $id_kelas_user = $Kelas_User[$i]->id;
                                                }
                                            }
                                            $Kelas_User = \App\Models\Kelas_User::find($id_kelas_user);
                                        ?>
                                        <a href="{{$link_menu_2}}/{{$x->id}}" style="text-decoration:none;color:black">
                                            {{$x->name}}
                                            <small>
                                                <br>
                                                @if($x->status == "Guru")
                                                    Guru / NIDN : {{$nis}}
                                                @elseif($x->status == "Siswa")
                                                    {{$Kelas_User->kelas}}-{{$Kelas_User->jurusan}} / NISN : {{$nis}}
                                                @endif
                                                
                                                <br>
                                                {{$x->email}}
                                            </small>
                                        </a>
                                    </td>
                                    @if(Auth::user()->status != 'Siswa')
                                        @if($x->status == 'Siswa' or Auth::user()->status == 'Admin' )
                                        <td style="width:10px">
                                            <a href="{{$link_menu_2}}/{{$x->id}}/destroy" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        @endif
                                    @endif
                                </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" method="POST" action="/akun-siswa/store" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Nama Lengkap*</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" name="name" required autocomplete="name" autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Status User*</label>
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                        <select class="form-control" name="status"  id="inputGroupSelect01">
                            <option selected>Pilih Status</option>
                            <option value="Guru">Guru</option>
                            <option value="Siswa">Siswa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Email*</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Password*</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"  name="password" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input class="form-control form-control-sm" name="foto" id="formFileSm" type="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Buat Akun</button>
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