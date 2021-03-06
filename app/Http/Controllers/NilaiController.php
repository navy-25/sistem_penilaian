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
    public function variabelNilai($id,$name)
    {
        $variabel_praktik = \App\Models\Variabel_Praktik::find($id);
        $sub_variabel_praktik = \App\Models\Sub_Variabel_Praktik::all();
        return view('nilai.kelolaPenilaian',compact('variabel_praktik','sub_variabel_praktik'));
    }
    public function destroy(Request $request, $id)
    {
        try{
            $sub_variabel_praktik = \App\Models\Sub_Variabel_Praktik::all();
            for ($i=0;$i < count($sub_variabel_praktik); $i++){
                if ($sub_variabel_praktik[$i]->id_variabel_praktik == $id){
                    $sub_variabel_praktik_delete = \App\Models\Sub_Variabel_Praktik::find($sub_variabel_praktik[$i]->id);
                    $sub_variabel_praktik_delete->delete($sub_variabel_praktik_delete);
                }
            }
            $variabel_praktik = \App\Models\Variabel_Praktik::find($id);     
            $variabel_praktik->delete($variabel_praktik);
            return redirect('/nilai/')->with(['success' => 'Akun berhasil di hapus selamanya !']);
        }catch (Exception $e){
            return redirect('/nilai/')->with(['gagal' => 'Gagal dihapus']);
        }
    }
    public function destroy_sub_variabel(Request $request, $id,$name,$id_sub_var)
    {
        try{
            $sub_variabel_praktik = \App\Models\Sub_Variabel_Praktik::find($id_sub_var);       
            $sub_variabel_praktik->delete($sub_variabel_praktik);
            return redirect('/nilai/'.$id.'/'.$name.'/list_variabel')->with(['success' => 'Variabel berhasil di hapus']);
        }catch (Exception $e){
            return redirect('/nilai/'.$id.'/'.$name.'/list_variabel')->with(['gagal' => 'Gagal dihapus']);
        }
    }
    public function store(Request $request)
    {
        try{
            $variabel_praktik = \App\Models\Variabel_Praktik::create([        
                'name' => $request->name,
                'id_kelas' => $request->id_kelas,
                'kkm' => $request->kkm,
            ]);
            return redirect('/nilai/')->with(['success' => 'Variabel Praktik '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/nilai/')->with(['gagal' => 'Variabel Praktik  '.$request->name.' gagal dibuat']);
        }
    }
    public function store_sub_variabel(Request $request,$id,$name)
    {
        try{
            $Sub_Variabel_Praktik = \App\Models\Sub_Variabel_Praktik::create([        
                'name' => $request->name,
                'id_variabel_praktik' =>$id,
                'deskripsi' => $request->deskripsi,
            ]);
            return redirect('/nilai/'.$id.'/'.$name.'/list_variabel')->with(['success' => 'Variabel Praktik '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/nilai/'.$id.'/'.$name.'/list_variabel')->with(['gagal' => 'Variabel Praktik  '.$request->name.' gagal dibuat']);
        }
    }
}
