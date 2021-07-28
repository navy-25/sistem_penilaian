<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        if($cari != null){
            $kelas = \App\Models\Kelas::where('name','like',"%".$cari."%")
                ->orderBy('updated_at', 'DESC')
                ->get();
        }else{
            $kelas = \App\Models\Kelas::orderBy('id', 'DESC')->get();
        }
        $user = \App\Models\User::all();
        return view('kelas.index',compact('kelas','user'));
    }
    public function store(Request $request)
    {
        $jam = $request->jam_mulai." - ".$request->jam_selesai;
        try{
            if (Auth::user()->status == "Admin"){
                $kelas = \App\Models\Kelas::create([        
                    'name' => $request->name,
                    'pembimbing' => $request->pembimbing,
                    'hari' => $request->hari,
                    'status' => $request->status,
                    'jam' =>  $jam,
                ]);
            }elseif (Auth::user()->status == "Guru"){
                $kelas = \App\Models\Kelas::create([        
                    'name' => $request->name,
                    'pembimbing' => Auth::user()->id,
                    'hari' => $request->hari,
                    'status' => $request->status,
                    'jam' =>  $jam,
                ]);
            }
            return redirect('/kelas/')->with(['success' => 'Kelas '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/kelas/')->with(['gagal' => 'Kelas '.$request->name.' gagal dibuat']);
        }
    }
    public function destroy(Request $request, $id)
    {
        try{
            $kelas = \App\Models\Kelas::find($id);      
            $modul = \App\Models\Modul::all();     
            $kontributor = \App\Models\Kontributor_Kelas::all();     
            for ($i=0;$i < count($modul); $i++){
                if ($modul[$i]->id_kelas == $id){
                    $modul_delete = \App\Models\Modul::find($modul[$i]->id);
                    $modul_delete->delete($modul_delete);
                }
            }
            for ($i=0;$i < count($kontributor); $i++){
                if ($kontributor[$i]->id_kelas == $id){
                    $kontributor_delete = \App\Models\Kontributor_Kelas::find($kontributor[$i]->id);
                    $kontributor_delete->delete($kontributor_delete);
                }
            }
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
        $modul = \App\Models\Modul::orderby('id','asc')->get();
        $variabel_praktik = \App\Models\Variabel_Praktik::all();
        return view('kelas.kelolaKelas',compact('kelas','user','modul','variabel_praktik'));
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
    // ========================================================
    public function tambah_kontributor(Request $request,$id,$nama)
    {
        if (Auth::user()->status == "Admin"){
            $kelas = \App\Models\Kelas::find($id);
            $id_guru = $kelas->pembimbing;
        }elseif (Auth::user()->status == "Guru"){
            $id_guru = Auth::user()->id;
        }
        try{
            $KontributorKelas = \App\Models\Kontributor_Kelas::create([        
                'id_kelas' => $id,
                'id_siswa' => $request->id_siswa,
                'id_guru' => $id_guru,
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
    public function kelola_tugas(Request $request,$id,$nama,$id_tugas)
    {
        $kelas = \App\Models\Kelas::find($id);  
        $user = \App\Models\User::all();  
        return view('kelas.uploadTugas',compact('kelas','user','id_tugas'));
    }
    public function beri_nilai_tugas(Request $request,$id,$nama,$id_tugas)
    {
        if($request->id_siswa == 0){
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['gagal' => 'Pilih siswa terlebih dahulu']);
        }elseif($request->nilai == null or $request->nilai == 0){
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['gagal' => 'Nilai belum diberikan']);
        }else{
            $NT =  \App\Models\Nilai_Tugas::all();
            for ($i = 0 ; $i < count($NT); $i++){
                if ($NT[$i]->id_siswa == $request->id_siswa and $NT[$i]->id_tugas == $id_tugas){
                    $Nilai_Tugas = \App\Models\Nilai_Tugas::find($NT[$i]->id);       
                    $data = [            
                        'nilai' => $request->nilai,
                    ];
                    $Nilai_Tugas->update($data);
                    return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['success' => 'Nilai Berhasil diperbarui']);
                }
            }
        }
        try{
            $Nilai_Tugas = \App\Models\Nilai_Tugas::create([        
                'id_siswa' => $request->id_siswa,
                'id_kelas' => $id,
                'id_tugas' => $id_tugas,
                'nilai' => $request->nilai,
            ]);
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['success' => 'Nilai berhasil ditambah']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['gagal' => 'Nilai gagal ditambah']);
        }
    }
    public function upload_tugas_siswa(Request $request,$id,$nama,$id_tugas)
    {
        if($request->file == null or $request->file == 0){
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['gagal' => 'File belum ditambahkan']);
        }
        else{
            $FTS =  \App\Models\File_Tugas_Siswa::all();
            for ($i = 0 ; $i < count($FTS); $i++){
                if ($FTS[$i]->id_siswa == Auth::user()->id and $FTS[$i]->id_tugas == $id_tugas){
                    $File_Tugas_Siswa = \App\Models\File_Tugas_Siswa::find($FTS[$i]->id);       
                    if ($request->hasFile('file')) {
                        $file = $request->file('file');
                        $filename = $request->file('file')->getClientOriginalName();
                        $request->file('file')->move('modul/siswa',$filename);
                        $File_Tugas_Siswa->file = $request->file('file')->getClientOriginalName();
                        $File_Tugas_Siswa->save();
                    } 
                    return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['success' => 'Nilai Berhasil diperbarui']);
                }
            }
        }
        try{
            $File_Tugas_Siswa = \App\Models\File_Tugas_Siswa::create([        
                'id_siswa' => Auth::user()->id,
                'id_kelas' => $id,
                'id_tugas' => $id_tugas,
                'file' => $request->file,
            ]);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = $request->file('file')->getClientOriginalName();
                $request->file('file')->move('modul/siswa/',$filename);
                $File_Tugas_Siswa->file = $request->file('file')->getClientOriginalName();
                $File_Tugas_Siswa->save();
            } 
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['success' => 'Tugas berhasil diupload']);
        }catch (Exception $e){
            return redirect('/kelas/'.$id.'/'.$nama.'/'.$id_tugas.'/tugas')->with(['gagal' => 'Tugas gagal diupload']);
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
    
    // =============================================================================
    // penilaian praktik
    public function kelolaPraktik($id_praktik,$name_praktik)
    {
        $sub_variabel_praktik =  \App\Models\Sub_Variabel_Praktik::all(); 
        $variabel_praktik =  \App\Models\Variabel_Praktik::find($id_praktik);
        $kelas = \App\Models\Kelas::find($variabel_praktik->id_kelas);  
        $Nilai_Praktik =  \App\Models\Nilai_Praktik::all(); 
        return view('kelas.kelolaPraktik',compact('kelas','sub_variabel_praktik','id_praktik','Nilai_Praktik','variabel_praktik'));
    }   
    public function penilaian($id_praktik,$name_praktik,$id_siswa)
    {
        $sub_variabel_praktik =  \App\Models\Sub_Variabel_Praktik::all(); 
        $variabel_praktik =  \App\Models\Variabel_Praktik::find($id_praktik);
        $siswa =  \App\Models\User::find($id_siswa);
        $kelas = \App\Models\Kelas::find($variabel_praktik->id_kelas); 
        return view('kelas.penilaian',compact('kelas','id_praktik','variabel_praktik','sub_variabel_praktik','siswa','id_siswa'));
    }
    public function store_nilai_praktik(Request $request ,$id_praktik,$name_praktik)
    {
        if($request->id_siswa == 0){
            return redirect($id_praktik.'/'.$name_praktik)->with(['gagal' => 'Pilih siswa terlebih dahulu']);
        }else{
            $NP =  \App\Models\Nilai_Praktik::all();
            for ($i = 0 ; $i < count($NP); $i++){
                if ($NP[$i]->id_siswa == $request->id_siswa and $NP[$i]->id_variabel_praktek == $id_praktik){
                    return redirect($id_praktik.'/'.$name_praktik)->with(['gagal' => 'Siswa sudah dinilai']);
                }
            }
        }
        $sub_variabel_praktik =  \App\Models\Sub_Variabel_Praktik::all();
        $count = 0;
        for ($i = 0 ; $i < count($sub_variabel_praktik); $i++){
            if ($sub_variabel_praktik[$i] -> id_variabel_praktik == $id_praktik){
                $count = $count + 1;
            }
        }
        $nilai= array(
            $request->nilai_1,
            $request->nilai_2,
            $request->nilai_3,
            $request->nilai_4,
            $request->nilai_5,
            $request->nilai_6,
            $request->nilai_7,
            $request->nilai_8,
            $request->nilai_9,
            $request->nilai_10,
            $request->nilai_11,
            $request->nilai_12,
            $request->nilai_13,
            $request->nilai_14,
            $request->nilai_15,
            $request->nilai_16,
            $request->nilai_17,
            $request->nilai_18,
            $request->nilai_19,
            $request->nilai_20,
            $request->nilai_21,
            $request->nilai_22,
            $request->nilai_23,
            $request->nilai_24,
            $request->nilai_25,
            $request->nilai_26,
            $request->nilai_27,
            $request->nilai_28,
            $request->nilai_29,
            $request->nilai_30,
        );
        $data = array();
        foreach ($nilai as $n) {
            if($n == null or $n == 0 or $n == ''){
                break;
            }
            array_push($data,$n);
        }

        $data_nilai = "";
        foreach ($data as $d) {
            $data_nilai = $data_nilai.$d.",";
        }
        $NILAI = substr($data_nilai,0,-1);
        $Variabel_Praktik = \App\Models\Variabel_Praktik::find($id_praktik);
        $Nilai_Praktik = \App\Models\Nilai_Praktik::create([        
            'id_siswa' => $request->id_siswa,
            'id_kelas' => $Variabel_Praktik->id_kelas,
            'id_variabel_praktek' => $id_praktik,
            'nilai' => $NILAI,
        ]);
        $Feedback_Praktik = \App\Models\Feedback_Praktik::create([        
            'id_siswa' => $request->id_siswa,
            'id_kelas' => $Variabel_Praktik->id_kelas,
            'id_variabel_praktek' => $id_praktik,
            
            'red_1' => $request->red_1,
            'red_2' => $request->red_2,
            'red_3' => $request->red_3,
            'vid_1' => $request->vid_1,
            'vid_2' => $request->vid_2,
            'catatan' => $request->catatan,
        ]);
        return redirect($id_praktik.'/'.$name_praktik)->with(['success' => 'Berhasil memberikan nilai dan feedback']);
    }
    public function destroy_nilai_praktik(Request $request, $id,$name_praktik,$id_nilai)
    {
        try{
            $Nilai_Praktik = \App\Models\Nilai_Praktik::find($id_nilai);      
            $Nilai_Praktik->delete($Nilai_Praktik);
            return redirect($id.'/'.$name_praktik)->with(['success' => 'Berhasil di hapus']);
        }catch (Exception $e){
            return redirect($id.'/'.$name_praktik)->with(['gagal' => 'Gagal dihapus']);
        }
    }
    public function updateNilai($id_praktik,$name_praktik,$id_nilai)
    {
        $sub_variabel_praktik =  \App\Models\Sub_Variabel_Praktik::all(); 
        $variabel_praktik =  \App\Models\Variabel_Praktik::find($id_praktik);
        $kelas = \App\Models\Kelas::find($variabel_praktik->id_kelas);  
        $Nilai_Praktik =  \App\Models\Nilai_Praktik::find($id_nilai);
        return view('kelas.updateNilai',compact('kelas','sub_variabel_praktik','id_praktik','Nilai_Praktik','variabel_praktik'));
    }  
}
