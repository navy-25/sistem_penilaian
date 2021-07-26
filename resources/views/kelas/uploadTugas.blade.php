
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
    $link_menu_3 = "/admin/kelas";
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
    <section class="content-header" style="padding-bottom:0px">
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
                    @else
                        @if(Auth::user()->status != 'Siswa')
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Informasi !</h5>
                                Masukkan nilai setiap siswa sesuai standar penilaian yang telah disusun oleh guru/pembimbing.
                            </div>
                        @else
                            <div class="alert alert-info alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-info"></i> Informasi !</h5>
                                Jika nilai belum tampil maka segera hubungi guru penanggung jawab mata pelajaran tersebut atau pembimbing kelas.
                            </div>
                        @endif
                    @endif
                    @if(Auth::user()->status != 'Siswa')
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#nilai_add">
                                <i class="fas fa-marker mr-1"></i> Beri Nilai
                            </button>
                            <button type="button"  class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#upload_tugas">
                                <i class="fas fa-file-word mr-1"></i> Upload Tugas
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin:10px">                   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tugas</th>
                                    <th>Nilai</th>
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
                                        $Nilai_Tugas = \App\Models\Nilai_Tugas::all();
                                        $File_Tugas_Siswa = \App\Models\File_Tugas_Siswa::all();
                                    ?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td data-bs-toggle="modal" data-bs-target="#soal_add">{{$siswa->name}}</td>
                                        <td>
                                            @foreach($File_Tugas_Siswa as $f)
                                            @if($k->id_siswa == $f->id_siswa)
                                                    @if(Auth::user()->status == 'Siswa')
                                                        {{$f->file}}
                                                    @else
                                                        <a target="_blank" href="{{$f->getFile()}}">{{$f->file}}</a>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($Nilai_Tugas as $n)
                                                @if($k->id_siswa == $n->id_siswa)
                                                    {{$n->nilai}} / 100
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="nilai_add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/{{$kelas->name}}/{{$id_tugas}}/tugas/beri_nilai"> 
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
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
                        <div class="col-4">
                            <div class="form-group">
                                <label >Nilai</label>
                                <select class="form-control" name="nilai"  id="inputGroupSelect01">
                                    <option selected>Pilih Nilai</option>
                                    <option value="100">100</option>
                                    <option value="90">90</option>
                                    <option value="80">80</option>
                                    <option value="70">70</option>
                                    <option value="60">60</option>
                                    <option value="50">50</option>
                                    <option value="40">40</option>
                                    <option value="30">30</option>
                                    <option value="20">20</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="upload_tugas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            
            <form class="form" method="POST" action="/kelas/{{$kelas->id}}/{{$kelas->name}}/{{$id_tugas}}/tugas/upload_tugas_siswa" enctype="multipart/form-data"> 
                @csrf
                <div class="modal-body">
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
@endsection
