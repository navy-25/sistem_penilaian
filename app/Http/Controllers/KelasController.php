<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = \App\Models\Kelas::orderBy('id', 'DESC')->get();
        $user = \App\Models\User::all();
        return view('kelas.index',compact('kelas','user'));
    }
    public function store(Request $request)
    {
        // dd($request->);
        $jam = $request->jam_mulai." - ".$request->jam_selesai;
        try{
            $kelas = \App\Models\Kelas::create([        
                'name' => $request->name,
                'pembimbing' => $request->pembimbing,
                'hari' => $request->hari,
                'status' => $request->status,
                'jam' =>  $jam,
            ]);
            return redirect('/kelas/')->with(['success' => 'Kelas '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/kelas/')->with(['gagal' => 'Kelas '.$request->name.' gagal dibuat']);
        }
    }
    public function destroy(Request $request, $id)
    {
        try{
            $kelas = \App\Models\Kelas::find($id);       
            $kelas->delete($kelas);
            return redirect('/kelas/')->with(['success' => 'Kelas '.$request->name.' berhasil di hapus']);
        }catch (Exception $e){
            return redirect('/kelas/')->with(['gagal' => 'Kelas '.$request->name.' gagal dihapus']);
        }
    }
    public function edit($id,$name)
    {
        $kelas = \App\Models\Kelas::find($id);  
        $user = \App\Models\User::all();
        return view('kelas.update',compact('kelas','user'));
    }
    public function kelolaKelas($id,$name)
    {
        $kelas = \App\Models\Kelas::find($id);  
        $user = \App\Models\User::all();
        $modul = \App\Models\Modul::orderby('id','desc')->get();
        return view('kelas.kelolaKelas',compact('kelas','user','modul'));
    }
    public function update(Request $request, $id)
    {
        $jam = $request->jam_mulai." - ".$request->jam_selesai;
        try{
            $kelas = \App\Models\Kelas::find($id);       
                $data = [            
                    'name' => $request->name,
                    'pembimbing' => $request->pembimbing,
                    'hari' => $request->hari,
                    'status' => $request->status,
                    'jam' =>  $jam,
                ];
                $kelas->update($data);
            return redirect('/kelas/')->with(['success' => 'Kelas '.$request->name.' berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/kelas/')->with(['gagal' => 'Kelas '.$request->name.' gagal diperbarui']);
        }
    }
    public function kelolaNilai()
    {
        return view('kelas.kelolaNilai');
    }
    public function kelolaPraktik()
    {
        return view('kelas.kelolaPraktik');
    }
    // ========================================================
    public function tambah_kontributor(Request $request,$id,$nama)
    {

        try{
            $KontributorKelas = \App\Models\Kontributor_Kelas::create([        
                'id_kelas' => $id,
                'id_siswa' => $request->id_siswa,
                'id_guru' => Auth::user()->id,
            ]);
            $user = \App\Models\User::find($request->id_siswa);   
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['success' => $user->name.' berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['gagal' => $user->name.' gagal ditambahkan']);
        }
    }
    public function hapus_kontributor(Request $request,$id,$nama)
    {
        // dd($nama);
        $kontributor = \App\Models\Kontributor_Kelas::find($id);  
        try{
            $KontributorKelas = \App\Models\Kontributor_Kelas::find($id);       
            $KontributorKelas->delete($KontributorKelas);
            return redirect('/kelas/'.$kontributor->id_kelas.'/'.$nama.'/masuk-kelas')->with(['success' => $kontributor->name.' berhasil dihapus']);
        }catch (Exception $e){
            return redirect('/kelas/'.$kontributor->id_kelas.'/'.$nama.'/masuk-kelas')->with(['gagal' => $kontributor->name.' gagal dihapus']);
        }
    }
    // ========================================================
    public function tambah_modul(Request $request,$id,$nama)
    {
        // dd($request->);
        try{
            $modul = \App\Models\Modul::create([        
                'name' => $request->name,
                'id_kelas' => $id,
                'jenis' => "Materi",
                'file' => $request->file,
            ]);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('modul/',$filename);
                $modul->file = $request->file('file')->getClientOriginalName();
                $modul->save();
            } 
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['success' => 'Modul '.$request->name.' berhasil diunggah']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['gagal' => 'Modul '.$request->name.' gagal diunggah']);
        }
    }
    public function tambah_tugas(Request $request,$id,$nama)
    {
        // dd($request->);
        try{
            $modul = \App\Models\Modul::create([        
                'name' => $request->name,
                'id_kelas' => $id,
                'jenis' => "Tugas",
                'file' => $request->file,
            ]);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('modul/',$filename);
                $modul->file = $request->file('file')->getClientOriginalName();
                $modul->save();
            } 
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['success' => 'Tugas '.$request->name.' berhasil diunggah']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['gagal' => 'Tugas '.$request->name.' gagal diunggah']);
        }
    }
    public function destroy_modul(Request $request, $id,$nama,$id_modul)
    {
        try{
            $modul = \App\Models\Modul::find($id_modul);      
            $name = $modul->name;
            $modul->delete($modul);
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['success' => 'Modul '.$name.' berhasil di hapus']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/masuk-kelas')->with(['gagal' => 'Modul '.$name.' gagal dihapus']);
        }
    }
}
