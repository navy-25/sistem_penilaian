
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
    <section class="content-header" style="padding-bottom:0px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-info"></i> Informasi !</h5>
                        Pertimbangkan kembali jika ingin menambah ataupun mengurangi nilai yang sebelumnya sudah dimasukkan.
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="margin:10px">                   
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="50px">No</th>
                                    <th width="80%">Variabel Nilai</th>
                                    <th width="17%">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    $nilai = explode(",",$Nilai_Praktik->nilai);
                                    $index = 0;
                                ?>
                                @foreach($sub_variabel_praktik as $s)
                                    @if($s->id_variabel_praktik == $id_praktik)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$s->name}}</td>
                                        <td>
                                            {{$nilai[$index]}}0 / 100
                                        </td>
                                    </tr>
                                    @endif
                                    <?php
                                        $index++;
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
                $FP =  \App\Models\Feedback_Praktik::all();
                $id_FP = 0;
                for ($i = 0 ; $i < count($FP); $i++){
                    if ($FP[$i]->id_siswa == $Nilai_Praktik->id_siswa and $FP[$i]->id_variabel_praktek == $id_praktik){
                        $id_FP = $FP[$i]->id;
                    }
                }
                $FP_user =  \App\Models\Feedback_Praktik::find($id_FP);
                // dd($FP_user);
            ?>
            <div class="col-md-4" style="padding:15px;padding-top:10px">
                <div class="card" style="padding:15px">
                    <p><b>Catatan : </b></p>
                    <p align="justify">{{$FP_user->catatan}}</p>
                </div>
                <hr>
                @if($FP_user->red_1 != null)
                <a class="btn btn-info" href="{{$FP_user->red_1}}" style="margin-bottom:10px;width:100%;" target="_blank"><i class="icon fas fa-external-link-alt mr-2"></i>Referensi Artikel</a>               
                @endif
                @if($FP_user->red_2 != null)
                <a class="btn btn-info" href="{{$FP_user->red_2}}" style="margin-bottom:10px;width:100%;" target="_blank"><i class="icon fas fa-external-link-alt mr-2"></i>Referensi Artikel</a>               
                @endif
                @if($FP_user->red_3 != null)
                <a class="btn btn-info" href="{{$FP_user->red_3}}" style="margin-bottom:10px;width:100%;" target="_blank"><i class="icon fas fa-external-link-alt mr-2"></i>Referensi Artikel</a>               
                @endif
                @if($FP_user->vid_1 != null)
                <hr>
                <a class="btn btn-danger" href="{{$FP_user->vid_1}}" style="margin-bottom:10px;width:100%;" target="_blank"><i class="icon fas fa-video mr-2"></i>Referensi Video</a>               
                @endif
                @if($FP_user->vid_2 != null)
                <a class="btn btn-danger" href="{{$FP_user->vid_2}}" style="margin-bottom:10px;width:100%;" target="_blank"><i class="icon fas fa-video mr-2"></i>Referensi Video</a>               
                @endif
                
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
