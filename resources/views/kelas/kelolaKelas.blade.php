
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
        <div class="row mb-2">
            <div class="col-sm-6">
                <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modul_add">
                    <i class="fas fa-book mr-1"></i>Modul
                </button>
                <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#soal_add">
                    <i class="fas fa-tasks mr-1"></i>Tugas
                </button>
                <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kontributor_add">
                    <i class="fas fa-user-plus mr-1"></i>Kontributor
                </button>
            </div>
        </div>
    @endif
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card card-primary card-outline">
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
                                    @foreach($modul as $m)
                                        @if($m->id_kelas == $kelas->id)
                                        <tr>
                                            <td align="left">
                                                <a target="_blank" style="text-decoration:none;color:black" href="{{$m->getFile()}}">{{$m->name}}</a> 
                                                @if($m->jenis == "Materi")
                                                <small style="background:yellow;padding:3px">
                                                        {{$m->jenis}}
                                                </small>    
                                                @elseif($m->jenis == "Tugas")
                                                <small style="background:red;padding:3px;color:white">
                                                        {{$m->jenis}}
                                                </small>  
                                                @endif
                                            </td>
                                            <td align="left">
                                                <a target="_blank" class="btn btn-info btn-sm" style="color:white;text-decoration:none;" href="{{$m->getFile()}}">{{$m->file}}</a> 
                                            </td>
                                            <td align="right">
                                                <a href="{{$m->getFile()}}" target="_blank" title="Download" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-file-download"></i>
                                                </a>
                                                @if(Auth::user()->status != 'Siswa')
                                                <a href="{{$link_menu_3}}/{{$kelas->id}}/{{$kelas->name}}/masuk-kelas/{{$m->id}}/hapus-modul" title="Hapus Modul/Tugas" class="btn btn-danger btn-sm delete-confirm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
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
                                        <td align="left">
                                            <a style="text-decoration:none;color:black" href="/admin/kelas/nama-kelas/kelola/praktik">
                                                001. Praktik Angle Foto
                                            </a>
                                        </td>
                                        <td align="right">
                                            <!-- <a href="" title="Hapus Akun Siswa" class="btn btn-secondary btn-sm stop-confirm">
                                                <i class="fas fa-stop mr-1"></i>Stop
                                            </a> -->
                                            <a href="/admin/kelas/nama-kelas/kelola/praktik" title="Hapus Akun Siswa" class="btn btn-success btn-sm">
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
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Status</th>
                                        @if(Auth::user()->status != 'Siswa')
                                        <th>Opsi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $kontributor = \App\Models\Kontributor_Kelas::all();
                                        $no = 1;
                                    ?>
                                    @foreach($kontributor as $k)
                                        @if($k->id_kelas == $kelas->id)
                                        <?php
                                            $siswa = \App\Models\User::find($k->id_siswa);
                                            $jurusan = \App\Models\Kategori_Jurusan::all();
                                            $Kelas_User = \App\Models\Kelas_User::all();
                                            for ($i=0;$i<count($Kelas_User);$i++){
                                                if($Kelas_User[$i]->id_siswa == $k->id_siswa){
                                                    $id_kelas_user = $Kelas_User[$i]->id;
                                                }
                                            }
                                            $Kelas_User = \App\Models\Kelas_User::find($id_kelas_user);
                                            // dd($Kelas_User);
                                        ?>
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$siswa->name}}</td>
                                            <td>{{$Kelas_User->kelas}}-{{$Kelas_User->jurusan}}</td>
                                            <td>{{$siswa->status}}</td>
                                            @if(Auth::user()->status != 'Siswa')
                                            <td>
                                                <a href="/kelas/{{$k->id}}/{{$kelas->name}}/masuk-kelas/hapus-kontributor" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                            @endif
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                <?php
                    for ($i=0;$i<count($user);$i++){
                        if($user[$i]->name == $kelas->pembimbing){
                            $id_user = $user[$i]->id;
                        }
                    }
                    // dd($id_user);
                    $pembimbing = \App\Models\User::find($id_user);
                ?>
                <div class="text-center">
                    <a href="{{$pembimbing->getFoto()}}" target="_blank" title="Foto Profil">
                        <img class="profile-user-img img-fluid img-circle"
                        src="{{$pembimbing->getFoto()}}" alt="User profile picture">
                    </a>
                </div>

                <h3 class="profile-username text-center">{{$kelas->name}}</h3>
                <p class="text-muted text-center"><b>Oleh : </b> {{$kelas->pembimbing}}</p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp; : {{$kelas->hari}}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;: {{$kelas->jam}}</li>
                </ul>
                <hr>
                <small>
                    <a href="" class="btn btn-success btn-sm" style="width:100%;margin-bottom:10px"> <i class="fas fa-video mr-2"></i>Join Meet</a>
                    <a href="" class="btn btn-outline-success btn-sm" style="width:100%"> <i class="fas fa-sms mr-2"></i>Join Grup Whatsapp</a>
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Modul Pembelajaran</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/{{$kelas->name}}/masuk-kelas/upload-modul" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Judul Modul/Materi*</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Judul Modul Pembelajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Materi*</label>
                        <input class="form-control form-control-sm" value="file" name="file" id="formFileSm" type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="soal_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Tugas</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/{{$kelas->name}}/masuk-kelas/upload-tugas" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Judul Tugas*</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Judul Modul Pembelajaran">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload Tugas*</label>
                        <input class="form-control form-control-sm" value="file" name="file" id="formFileSm" type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="kontributor_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/{{$kelas->name}}/masuk-kelas/tambah-kontributor">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label >Pilih Siswa*</label>
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                        <select class="form-control" name="id_siswa"  id="inputGroupSelect01">
                            <option selected>Pilih Siswa</option>
                            @foreach($user as $s)
                                @if($s->role != 'admin')
                                    @if($s->status == 'Siswa')
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
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
