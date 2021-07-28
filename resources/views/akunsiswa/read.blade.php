
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

@section('menu_2')
active
@endsection

@section('sub_tittle')
{{$nama_menu_2}} - Nama Siswa
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
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Gagal disimpan !</h5>
                    {{$message}}
                </div>
                @else
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Hati - hati !</h5>
                    Akun yang sudah dihapus tidak bisa di onlinekan kembali.
                </div>
                @endif
            @endif
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <a href="{{$user->getFoto()}}" target="_blank" title="Foto Profil">
                    <img class="profile-user-img img-fluid img-circle"
                    src="{{$user->getFoto()}}" alt="User profile picture">
                </a>
            </div>

            <h3 class="profile-username text-center">{{$user->name}}</h3>
            <p class="text-muted text-center">
                <?php
                    if($user->nis == Null){
                        $nis = '-';
                    }else{
                        $nis = $user->nis;
                    }
                ?>
                {{$nis}} / {{$user->status}}</p>
            <!-- <br> -->
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tentang Saya</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat Rumah</strong>
            <p class="text-muted">{{$user->alamat}}</p>

            <hr>
            <?php
                try{
                    $telp = explode("8",$user->telepon);
                    if($telp[0] == 0){
                        $phone_number = "628".$telp[1];
                    }else{
                        $phone_number = $user->telepon;
                    }
                }catch (Exception $e){
                    $phone_number = $user->telepon;
                }
            ?>
            <strong><i class="fas fa-phone-volume mr-1"></i>Telepon</strong>
            <p class="text-muted">Whatsapp &nbsp;: 
                <a href="https://wa.me/{{$phone_number}}" target="_blank">{{$user->telepon}}</a>
            <br>

            <hr>
            <strong><i class="far fa-file-alt mr-1"></i> Social Media</strong>
            <p class="text-muted">Instagram &nbsp;: 
                <a href="https://www.instagram.com/n_vi25/" target="_blank">{{$user->ig}}</a>
            <br>
            Twitter &nbsp; &nbsp; &nbsp; &nbsp;: 
                <a href="https://www.twitter.com/n_vi25/" target="_blank">{{$user->tw}}</a>
            <br>
            Facebook &nbsp; : 
                <a href="https://facebook.com/muhammadnafimaulahakim/" target="_blank">{{$user->fb}}</a>
            </p>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
        <!-- <div class="card-header p-2">
            <ul class="nav nav-pills"> -->
            <!-- <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Aktivitas</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Pengaturan</a></li>
            </ul>
        </div> -->
        <!-- /.card-header -->
        @if(Auth::user()->status != 'Siswa')
            @if($user->status == 'Siswa' or Auth::user()->status == 'Admin' )
                <div class="card-body">
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <!-- <div class="active tab-pane" id="timeline">
                            <div class="timeline timeline-inverse">
                                <div class="time-label">
                                    <span class="bg-danger">
                                    10 Feb. 2014
                                    </span>
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-primary"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <i class="far fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.tab-pane -->

                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal" method="POST" action="/akun-siswa/{{$user->id}}/update" enctype="multipart/form-data"> 
                                @csrf
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" name="name" value="{{$user->name}}" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <?php
                                    $Jurusan = \App\Models\Kategori_Jurusan::all();
                                    $Kelas_User = \App\Models\Kelas_User::all();
                                    $id_kelas_user =0;
                                    for ($i=0;$i<count($Kelas_User);$i++){
                                        if($Kelas_User[$i]->id_siswa == $user->id){
                                            $id_kelas_user = $Kelas_User[$i]->id;
                                        }
                                    }
                                    if($id_kelas_user == 0 ){
                                        $kelas = "Kosong";
                                        $jurusan = "Kosong";
                                    }else{
                                        $Kelas_User = \App\Models\Kelas_User::find($id_kelas_user);
                                        $kelas = $Kelas_User->kelas;
                                        $jurusan = $Kelas_User->jurusan;
                                    }
                                    // dd($Kelas_User);
                                ?>
                                @if($user->status != "Guru")
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Kelas*</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="kelas" id="inputGroupSelect01">
                                            <option value="{{$kelas}}" selected>{{$kelas}}</option>
                                            <option value="XII">XII</option>
                                            <option value="XI">XI</option>
                                            <option value="X">X</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Jurusan*</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jurusan" id="inputGroupSelect01">
                                            <option value="{{$jurusan}}" selected>{{$jurusan}}</option>
                                            @foreach($Jurusan as $j)
                                                <option value="{{$j->nama}}">{{$j->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group row">
                                    @if($user->status == "Guru")
                                        <label for="inputName" class="col-sm-2 col-form-label">NIDN*</label>
                                    @elseif($user->status == "Siswa")
                                        <label for="inputName" class="col-sm-2 col-form-label">NISN*</label>
                                    @endif
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputName" name="nis" value="{{$user->nis}}" placeholder="Nomor Induk ..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Telepon*</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="inputName" name="telepon" value="{{$user->telepon}}" placeholder="Telepon">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email"   value="{{$user->email}}"  id="inputEmail" placeholder="Email">
                                    </div>
                                </div>                                           
                                <style>
                                    .mb-3, .my-3 {
                                        margin-bottom: 0rem!important;
                                    }
                                </style>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">instagram.com/</span>
                                            <input type="text" class="form-control"name="ig"   value="{{$user->ig}}"  placeholder="username intagram">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">twitter.com/</span>
                                            <input type="text" class="form-control" name="tw"  value="{{$user->tw}}"  placeholder="username twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">facebook.com/</span>
                                            <input type="text" class="form-control" name="fb"  value="{{$user->fb}}"  placeholder="username facebook">
                                        </div>
                                    </div>
                                </div>                       
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Alamat*</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" name="alamat"  placeholder="Alamat Lengkap Rumah">{{$user->alamat}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Foto</label>
                                    <div class="col-sm-10">
                                        <input class="form-control form-control-sm" value="foto" name="foto" id="formFileSm" type="file">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary" style="width:100%;margin-bottom:10px">
                                            <i class="fas fa-save mr-1"></i>Simpan
                                        </button>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" style="width:100%;margin-bottom:10px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                            <i class="fas fa-key mr-1"></i>
                                            Perbarui Password
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
            @endif
        @endif
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ganti Password</h5>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
            <div class="form-group mb-3" >
                <div class="input-group input-group-merge input-group-alternative">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <br>
            <div class="form-group mb-3" >
                <div class="input-group input-group-merge input-group-alternative">
                    <input id="password-confirm" type="password" placeholder="Password Confirm"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger ubah-password-confirm">Konfirmasi</button>
    </div>
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
<script>
    $('.update-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Update akun siswa ?',
            // text: 'Akun yang sudah dihapus tidak bisa di onlinekan kembali',
            icon: 'info',
            buttons: ["Batalkan", "Perbarui"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
<script>
    $('.ubah-password-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Yakin dengan password anda ?',
            // text: 'Akun yang sudah dihapus tidak bisa di onlinekan kembali',
            icon: 'warning',
            buttons: ["Batalkan", "Yakin"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>
@endsection
