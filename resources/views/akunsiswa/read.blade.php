
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
Akun Siswa - Nama Siswa
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="{{$link_menu_2}}" class="btn btn-outline-secondary" >
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{$link_menu_1}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{$link_menu_2}}">Akun Siswa</a></li>
            <li class="breadcrumb-item active">Muhammad Nafi' Maula Hakim</li>
            </ol>
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
                <a href="../../dist/img/user2-160x160.jpg" target="_blank" title="Foto Profil">
                    <img class="profile-user-img img-fluid img-circle"
                    src="../../dist/img/user2-160x160.jpg" alt="User profile picture">
                </a>
            </div>

            <h3 class="profile-username text-center">Muhammad Nafi' Maula Hakim</h3>
            <p class="text-muted text-center">XI Multimedia</p>
            <!-- <br> -->
            <p class="text-muted text-center">"Bio"</p>
            <a href="#" class="btn btn-primary btn-block"><b>Upload</b></a>
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
            <p class="text-muted">Ds. Bandar Kec. Bandar Kedung Mulyo, Kab. Jombang</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Hobby</strong>
            <p class="text-muted">
                <span class="tag">Bernyanyi, </span>
                <span class="tag">Game, </span>
                <span class="tag">Gitar</span>
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Social Media</strong>
            <p class="text-muted">Instagram &nbsp;: 
                <a href="https://www.instagram.com/n_vi25/">@n_vi25</a>
            <br>
            Twitter &nbsp; &nbsp; &nbsp; &nbsp;: 
                <a href="https://www.twitter.com/n_vi25/">@n_vi25</a>
            <br>
            Facebook &nbsp; : 
                <a href="https://facebook.com/muhammadnafimaulahakim/">muhammadnafimaulahakim</a>
            </p>
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Aktivitas</a></li>
            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pengaturan</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-danger">
                            10 Feb. 2014
                            </span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
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
                        <!-- END timeline item -->
                        <div>
                            <i class="far fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama*</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputName" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Kelas*</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="inputGroupSelect01">
                                    <option selected>Pilih Kelas</option>
                                    <option value="1">XII</option>
                                    <option value="2">XIII</option>
                                    <option value="3">IX</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="inputGroupSelect01">
                                    <option selected>Pilih Jurusan</option>
                                    <option value="1">Multimedia</option>
                                    <option value="2">Teknik Sepeda Motor</option>
                                    <option value="3">Akuntansi</option>
                                    <option value="4">Perkantoran</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>                       
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Hobby</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputSkills" placeholder="Hobby">
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
                                    <span class="input-group-text">https://www.instagram.com/</span>
                                    <input type="text" class="form-control" placeholder="username intagram">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Twitter</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">https://www.twitter.com/</span>
                                    <input type="text" class="form-control" placeholder="username twitter">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Facebook</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <span class="input-group-text">https://www.facebook.com/</span>
                                    <input type="text" class="form-control" placeholder="username facebook">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Bio*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Bio"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Alamat*</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="Alamat Lengkap Rumah"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-md-2 col-sm-2">
                                <button type="submit" class="btn btn-primary update-confirm" style="width:100%;margin-bottom:10px">
                                    <i class="fas fa-edit mr-1"></i>Update
                                </button>
                            </div>
                            <div class="col-md-1 col-sm-2">
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <a href="" class="btn btn-outline-secondary delete-confirm" style="width:100%;margin-bottom:10px">
                                    <i class="fas fa-trash mr-1"></i>
                                    Hapus Akun
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-3">
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
<div class="modal-dialog">
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
