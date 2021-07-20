<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class AkunSiswaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        if($cari != null){
            $user = \App\Models\User::where('name','like',"%".$cari."%")
                ->orWhere('email','like',"%".$cari."%")
                ->orderBy('updated_at', 'DESC')
                ->paginate(15);
            return view('akunsiswa.index',compact('user'));
        }else{
            $user = \App\Models\User::orderBy('updated_at', 'DESC')->paginate(15);
            return view('akunsiswa.index',compact('user'));
        }
        return view('akunsiswa.index');
    }
    public function store(Request $request)
    {
        try{
            $user = \App\Models\User::create([        
                'name' => $request->name,
                'email' => $request->email,
                'role' => "user",
                'status' => $request->status,
                'foto' => $request->foto,
                'password' =>  Hash::make($request['password']),
            ]);
            $Kelas_User = \App\Models\Kelas_User::create([        
                'kelas' => "Kosong",
                'jurusan' => "Kosong",
                'id_siswa' => $user->id,
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('image/',$filename);
                $user->foto = $request->file('foto')->getClientOriginalName();
                $user->save();
            } 
            return redirect('/akun-siswa/')->with(['success' => 'Akun '.$request->name.' berhasil dibuat']);
        }catch (Exception $e){
            return redirect('/akun-siswa/')->with(['gagal' => 'Akun '.$request->name.' gagal dibuat']);
        }
    }
    public function read($id)
    {
        $user = \App\Models\User::find($id);
        return view('akunsiswa.read',compact('user'));
    }
    public function destroy(Request $request, $id)
    {
        try{
            $user = \App\Models\User::find($id);       
            $user->delete($user);
            return redirect('/akun-siswa/')->with(['success' => 'Akun berhasil di hapus selamanya !']);
        }catch (Exception $e){
            return redirect('/akun-siswa/')->with(['gagal' => 'Gagal dihapus']);
        }
    }
    public function update(Request $request, $id)
    {
        $Kelas_User = \App\Models\Kelas_User::all();
            for ($i=0;$i<count($Kelas_User);$i++){
                if($Kelas_User[$i]->id_siswa == $id){
                    $id_kelas_user = $Kelas_User[$i]->id;
                }
            }
        if(count($Kelas_User) != 0){
            $Kelas_User = \App\Models\Kelas_User::find($id_kelas_user);     
                $data = [            
                    'kelas' => $request->kelas,
                    'jurusan' => $request->jurusan,
                    'id_siswa' => $id,
                ];
            $Kelas_User->update($data);
        }else{
            $Kelas_User = \App\Models\Kelas_User::create([        
                'kelas' => $request->kelas,
                'jurusan' => $request->jurusan,
                'id_siswa' => $id,
            ]);
        }
        try{
            $user = \App\Models\User::find($id);       
                $data = [            
                    'name' => $request->name,
                    'alamat' => $request->alamat,
                    'ig' => $request->ig,
                    'telepon' => $request->telepon,
                    'fb' => $request->fb,
                    'tw' => $request->tw,
                    'nis' => $request->nis,
                    'email' => $request->email,
                ];
                $user->update($data);
                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $filename = $request->file('foto')->getClientOriginalName();
                    $request->file('foto')->move('image/',$filename);
                    $user->foto = $request->file('foto')->getClientOriginalName();
                    $user->save();
                } 
            return redirect('/akun-siswa/'.$id."/")->with(['success' => 'Data '.$user->name.' berhasil di simpan']);
        }catch (Exception $e){
            return redirect('/akun-siswa/'.$id."/")->with(['gagal' => 'Data '.$user->name.' gagal diperbarui']);
        }
    }
}
