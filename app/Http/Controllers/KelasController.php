<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index');
    }
    public function update()
    {
        return view('kelas.update');
    }
    public function kelolaKelas()
    {
        return view('kelas.kelolaKelas');
    }
}
