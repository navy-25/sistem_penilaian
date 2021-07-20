<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $variabel_praktik = \App\Models\Variabel_Praktik::all();
        $kelas = \App\Models\Kelas::all();
        return view('nilai.index',compact('kelas','variabel_praktik'));
    }
    public function variabelNilai($id)
    {
        $variabel_praktik = \App\Models\Variabel_Praktik::find($id);
        $sub_variabel_praktik = \App\Models\Sub_Variabel_Praktik::all();
        return view('nilai.kelolaPenilaian',compact('variabel_praktik','sub_variabel_praktik'));
    }
    public function destroy(Request $request, $id)
    {
        try{
            $variabel_praktik = \App\Models\Variabel_Praktik::find($id);     
            $variabel_praktik->delete($variabel_praktik);
            return redirect('/nilai/')->with(['success' => 'Akun berhasil di hapus selamanya !']);
        }catch (Exception $e){
            return redirect('/nilai/')->with(['gagal' => 'Gagal dihapus']);
        }
    }
    public function store(Request $request)
    {
        try{
            $variabel_praktik = \App\Models\Variabel_Praktik::create([        
                'name' => $request->name,
                'id_kelas' => $request->id_kelas,
            ]);
            return redirect('/nilai/')->with(['success' => 'Variabel Praktik '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/nilai/')->with(['gagal' => 'Variabel Praktik  '.$request->name.' gagal dibuat']);
        }
    }
    public function store_sub_variabel(Request $request,$id,$name)
    {
        try{
            $sub_variabel_praktik = \App\Models\Sub_Variabel_Praktik::create([        
                'name' => $request->name,
                'deskripsi' => $request->deskripsi,
                'id_variabel_praktik' => $id,
            ]);
            return redirect('/nilai/'.$id.'/'.$name)->with(['success' => 'Variabel Praktik '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/nilai/'.$id.'/'.$name)->with(['gagal' => 'Variabel Praktik  '.$request->name.' gagal dibuat']);
        }
    }
}
