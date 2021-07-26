
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
        <div class="col-md-8">
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
                                    <?php
                                        $no = 1;
                                    ?>
                                    @foreach($modul as $m)
                                        @if($m->id_kelas == $kelas->id)
                                        <tr>
                                            <td align="left">
                                                @if($m->jenis == "Materi")
                                                <a target="_blank" style="text-decoration:none;color:black" href="{{$m->getFile()}}">{{$no++}}. {{$m->name}}</a> 
                                                <small style="background:yellow;padding:3px">
                                                        {{$m->jenis}}
                                                </small>    
                                                @elseif($m->jenis == "Tugas")
                                                <a style="text-decoration:none;color:black" href="/kelas/{{$kelas->id}}/{{$kelas->name}}/{{$m->id}}/tugas">{{$no++}}. {{$m->name}}</a> 
                                                <small style="background:red;padding:3px;color:white">
                                                        {{$m->jenis}}
                                                </small>  
                                                @endif
                                            </td>
                                            <td align="left">
                                                @if($m->file != null)
                                                <a target="_blank" class="btn btn-info btn-sm" style="color:white;text-decoration:none;" href="{{$m->getFile()}}"><i class="fas fa-file-download mr-1"></i> {{$m->file}}</a> 
                                                @endif
                                            </td>
                                            <td align="right">
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
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="praktik">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                    <?php
                                        $no = 1;
                                    ?>
                                    @foreach($variabel_praktik as $v)
                                        @if($v->id_kelas == $kelas->id)
                                        <tr>
                                            <td align="left">
                                                <a style="text-decoration:none;color:black" href="/admin/kelas/nama-kelas/kelola/praktik">
                                                    {{$no++}}. {{$v->name}}
                                                </a>
                                            </td>
                                            <td align="right">
                                                <a href="/{{$v->id}}/{{$v->name}}" title="Lakukan Penilaian" class="btn btn-success btn-sm">
                                                    <i class="fas fa-play mr-1"></i>Mulai penilaian
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="kontributor">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light card-primary card-outline">   
                <div class="card-header text-muted border-bottom-0">
                    <!-- 2 Hari lagi -->
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>{{$kelas->name}}</b></h2>
                            <?php
                                $pembimbing = \App\Models\User::find($kelas->pembimbing);
                                $variabel_praktik = \App\Models\Variabel_Praktik::all();
                                $praktik = "Unknown";
                                for($i = 0 ; $i < count($variabel_praktik) ; $i++){
                                    if($variabel_praktik[$i]->id_kelas == $kelas->id){
                                        $vp = \App\Models\Variabel_Praktik::find($variabel_praktik[$i]->id);
                                        $praktik = $vp->name;
                                    }
                                }
                            ?>
                            <p class="text-muted text-sm">{{$pembimbing->name}}</p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{$kelas->hari}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;&nbsp;&nbsp;: {{$kelas->jam}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-sm fa-person-booth mr-1"></i></span> 
                                    Praktik &nbsp;: <br> {{$praktik}}
                                </li>
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{$pembimbing->getFoto()}}" alt="" class="img-circle img-fluid">
                        </div>
                    </div>
                    <hr>
                    <small>
                        <a href="" class="btn btn-success btn-sm" style="width:100%;margin-bottom:10px"> <i class="fas fa-video mr-2"></i>Join Meet</a>
                        <a href="" class="btn btn-outline-success btn-sm" style="width:100%"> <i class="fas fa-sms mr-2"></i>Join Grup Whatsapp</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="modul_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Modul Pembelajaran</h5>
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
