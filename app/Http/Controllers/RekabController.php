<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekabController extends Controller
{
    public function index()
    {
        $kelas = \App\Models\Kelas::all();
        return view('rekab.index',compact('kelas'));
    }
    public function nilai_kelas($id_kelas,$name_kelas)
    {
        $Kontributor_Kelas = \App\Models\Kontributor_Kelas::all();
        $kelas = \App\Models\Kelas::find($id_kelas);
        return view('rekab.nilai',compact('kelas','Kontributor_Kelas'));
    }
}
