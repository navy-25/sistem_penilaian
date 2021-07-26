
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
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-info"></i> Informasi !</h5>
                            Siswa yang tidak terdaftar kelas tidak bisa iku praktik.
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-2">
            <div class="col-sm-12">
                <button type="button"  class="btn btn-primary btn-sm"  title="Mulai melakukan penilaian"  data-bs-toggle="modal" data-bs-target="#play_praktik">
                    <i class="fas fa-play mr-1"></i> Mulai Penilaian
                </button>
                <!-- <button type="button"  class="btn btn-secondary btn-sm" title="Tambah Feedback" data-bs-toggle="modal" data-bs-target="#feedback_praktik">
                    <i class="fas fa-comments mr-1"></i> Berikan Feedback
                </button> -->
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
                                    <th>Nama Siswa</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $kontributor = \App\Models\Kontributor_Kelas::all();
                                    $no = 1;
                                ?>
                                @foreach($Nilai_Praktik as $k)
                                    @if($k->id_kelas == $kelas->id)
                                    <?php
                                        $siswa = \App\Models\User::find($k->id_siswa);
                                        $nilai = explode(",",$k->nilai);
                                        $nilai_total = 0;
                                        foreach($nilai as $n){
                                            $nilai_total = $nilai_total+$n;
                                        }
                                        
                                        $sub_variabel_praktik =  \App\Models\Sub_Variabel_Praktik::all();
                                        $count = 0;
                                        for ($i = 0 ; $i < count($sub_variabel_praktik); $i++){
                                            if ($sub_variabel_praktik[$i]->id_variabel_praktik == $k->id_variabel_praktek){
                                                $count = $count + 1;
                                            }
                                        }
                                        $avg = round($nilai_total/$count * 10,2);
                                        if($avg >= $variabel_praktik->kkm){
                                            $status = "Lulus";
                                        }else{
                                            $status = "Remidi";
                                        }
                                    ?>
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>
                                            <a href="/{{$variabel_praktik->id}}/{{$variabel_praktik->name}}/{{$k->id}}" style="text-decoration:none;color:black" title="Lihat Nilai">
                                                {{$siswa->name}}
                                            </a>
                                        </td>
                                        <td>{{$avg}} / 100</td>
                                        <td>{{$status}}</td>
                                        <td>
                                            <!-- <button class="btn btn-secondary btn-sm"  title="Feedback" data-bs-toggle="modal" data-bs-target="#feedback_praktik">
                                                <i class="fas fa-comments"></i>
                                            </button> -->
                                            <a href="/{{$variabel_praktik->id}}/{{$variabel_praktik->name}}/{{$k->id}}/destroy" title="Hapus Akun Siswa" class="btn btn-danger btn-sm delete-confirm">
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
            </div>
            <div class="col-md-5">
                <div class="card bg-light card-primary card-outline" style="margin:10px">   
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
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-calendar-alt mr-1"></i></span> Hari &nbsp;&nbsp;&nbsp;&nbsp; : {{$kelas->hari}}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-clock mr-1"></i></span> Pukul &nbsp;&nbsp;: {{$kelas->jam}}</li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-person-booth mr-1"></i></span> 
                                        Praktik &nbsp;&nbsp;: <br> {{$praktik}}
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
<div class="modal fade" id="play_praktik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <?php
                $praktik = \App\Models\Variabel_Praktik::find($id_praktik);
                $label = 1;
            ?>
            <form class="form" method="POST" action="/{{$praktik->id}}/{{$praktik->name}}/store"> 
                @csrf
                <div class="modal-body">
                    <?php
                        $user = \App\Models\User::all();
                    ?>
                    <div class="form-group">
                        <label >Pilih Siswa*</label>
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                        <select class="form-control" name="id_siswa"  id="inputGroupSelect01">
                            <option value=0 selected>Pilih Siswa</option>
                            @foreach($user as $s)
                                @if($s->role != 'admin')
                                    @if($s->status == 'Siswa')
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    @foreach($sub_variabel_praktik as $s)
                        @if($s->id_variabel_praktik == $id_praktik)
                            <?php
                                $nilai = "nilai_".$label;
                            ?>  
                            <div class="form-group" style="margin-bottom:0px"> 
                                <label >{{$s->name}}*</label>
                                <input type="range" min="1" name="{{$nilai}}" value="5" max="10" step="1" class="form-control">
                                <div class="row">
                                    <div class="col-3">
                                        <p align="left" style="padding-left:60px">
                                            20 
                                        </p>
                                    </div>
                                    <div class="col-3">
                                        <p align="left" style="padding-left:35px">
                                            40 
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <p align="right" style="padding-right:45px">
                                            60 
                                        </p>
                                    </div>
                                    <div class="col-2">
                                        <p align="right" style="padding-right:30px">
                                            80 
                                        </p>
                                    </div>
                                    <div class="col-2"2
                                        <p align="right" style="padding-right:15px">
                                            100   
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $label = $label + 1;
                            ?>
                        @endif
                    @endforeach
                    <hr>
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Referensi materi (optional)</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_1' placeholder="copy link/url nya disini">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_2' placeholder="copy link/url nya disini">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_3' placeholder="copy link/url nya disini">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Tutorial Youtube (optional)</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" name='vid_1' placeholder="copy link/url nya disini">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" name='vid_2' placeholder="copy link/url nya disini">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea class="form-control" rows="2" name='catatan' placeholder="Catatan untuk siswa"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan & Akhiri</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="feedback_praktik" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <form class="form" method="POST" action='/{{$praktik->id}}/{{$praktik->name}}/feedback'> 
                @csrf
                <div class="modal-body">
                    <?php
                        $user = \App\Models\User::all();
                    ?>
                    <div class="form-group">
                        <label >Pilih Siswa*</label>
                        <!-- <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Kelas/Mata Pelajaran"> -->
                        <select class="form-control" name="id_siswa"  id="inputGroupSelect01">
                            <option value=0 selected>Pilih Siswa</option>
                            @foreach($user as $s)
                                @if($s->role != 'admin')
                                    @if($s->status == 'Siswa')
                                    <option value="{{$s->id}}">{{$s->name}}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Referensi materi</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_1' placeholder="materi-modul.com/tentang-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_2' placeholder="materi-modul.com/angle-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.google.com/</span>
                                <input type="text" class="form-control" name='red_3' placeholder="materi-modul.com/teknis-foto">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row" style="margin-bottom:0px;">
                        <div class="col-sm-12">
                            <small>Tutorial Youtube</small>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" name='vid_1' placeholder="results?search_query=teknik-foto">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">www.youtube.com/</span>
                                <input type="text" class="form-control" name='vid_2' placeholder="results?search_query=teknik-foto">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea class="form-control" rows="2" name='catatan' placeholder="Catatan untuk siswa"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success confirm">Kirim</button>
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
            title: 'Apakah anda yakin ?',
            text: 'Data yang sudah dihapus tidak bisa dikembalikan lagi',
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
