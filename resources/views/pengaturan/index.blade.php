
@extends('layouts.master')
<!-- teks statis -->
<?php
    // head
    $tittle = "Sistem Penilaian";

    // fitur name
    $nama_menu_1 = "Beranda";
    $nama_menu_2 = "Akun Siswa";
    $nama_menu_3 = "Kelas";
    $nama_menu_4 = "Input Nilai";
    $nama_menu_5 = "SOP Nilai Praktik";
    $nama_menu_6 = "Rekab Nilai";
    $nama_menu_7 = "Pengaturan";

    // icon menu
    $icon_menu_1 = "home";
    $icon_menu_2 = "user";
    $icon_menu_3 = "graduation-cap";
    $icon_menu_4 = "award";
    $icon_menu_5 = "award";
    $icon_menu_6 = "file-alt";
    $icon_menu_7 = "sliders-h";

    //link routes
    $link_menu_1 = "/admin/beranda";
    $link_menu_2 = "/admin/akun-siswa";
    $link_menu_3 = "/admin/kelas";
    $link_menu_4 = "/admin/soal";
    $link_menu_5 = "/admin/nilai";
    $link_menu_6 = "/admin/rekab";
    $link_menu_7 = "/admin/rekab";
?>

@section('menu_7')
active
@endsection

@section('sub_tittle')
{{$nama_menu_7}}
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-exclamation-triangle"></i> Hati - hati !</h5>
                Akun yang sudah dihapus tidak bisa di onlinekan kembali.
            </div>
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Nama*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">NIDN*</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="NIDN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email*</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
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
                                            <input type="text" class="form-control" placeholder="username intagram">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">twitter.com/</span>
                                            <input type="text" class="form-control" placeholder="username twitter">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">facebook.com/</span>
                                            <input type="text" class="form-control" placeholder="username facebook">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Alamat*</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Alamat Lengkap Rumah"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-primary update-confirm" style=";margin-bottom:10px">
                                            <i class="fas fa-edit mr-1"></i>Update
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

                        <h3 class="profile-username text-center">Admin</h3>
                        <p class="text-muted text-center">Admin Sistem</p>
                        <!-- <br> -->
                        <!-- <a href="#" class="btn btn-primary btn-block"><b>Upload</b></a> -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <a href="" class="btn btn-outline-secondary delete-confirm" style="width:100%;margin-bottom:10px">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus Akun
                        </a>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" style="width:100%;margin-bottom:10px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-key mr-1"></i>
                            Perbarui Password
                        </button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        <!--    /.col -->
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
@endsection