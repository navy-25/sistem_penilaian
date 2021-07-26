<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::all();
        $jumlah_guru = 0;
        $jumlah_admin = 0;
        $jumlah_siswa = 0;
        foreach ($user as $x){
            if($x->status == "Siswa"){
                $jumlah_siswa = $jumlah_siswa + 1;
            }elseif($x->status == "Guru"){
                $jumlah_guru = $jumlah_guru + 1;
            }else{
                $jumlah_admin = $jumlah_admin + 1;
            }
        }
        $all =  $jumlah_siswa + $jumlah_guru;
        return view('beranda.index',compact('jumlah_admin','jumlah_guru','jumlah_siswa','all'));
    }
}
