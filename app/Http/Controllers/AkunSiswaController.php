<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AkunSiswaController extends Controller
{
    public function index()
    {
        return view('akunsiswa.index');
    }
    public function read()
    {
        return view('akunsiswa.read');
    }
}
