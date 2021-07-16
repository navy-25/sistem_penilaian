<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekabController extends Controller
{
    public function index()
    {
        return view('rekab.index');
    }
}
