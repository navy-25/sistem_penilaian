<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('pengaturan.index');
    }
    public function update(Request $request, $id)
    {
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
            return redirect('/pengaturan/')->with(['success' => 'Data baru berhasil di simpan']);
        }catch (Exception $e){
            return redirect('/pengaturan/')->with(['gagal' => 'Data gagal diperbarui']);
        }
    }
    public function ganti_password(Request $request, $id)
    {
        if ($request->password_confirmation == $request->password){
            try{
                $user = \App\Models\User::find($id);       
                    $data = [            
                        'password' => Hash::make($request['password']),
                    ];
                    $user->update($data);
                return redirect('/pengaturan/')->with(['success' => 'Data baru berhasil di simpan']);
            }catch (Exception $e){
                return redirect('/pengaturan/')->with(['gagal' => 'Data gagal diperbarui']);
            }
        }else{
            return redirect('/pengaturan/')->with(['gagal' => 'Password tidak cocok ulangi lagi dengan teliti']);
        }
    }
    public function hapus_akun(Request $request, $id)
    {
        $user = \App\Models\User::find($id);   
        dd($user);
        try{
            $user = \App\Models\User::find($id);       
            $user->delete($user);
            return redirect('/')->with(['success' => 'Akun berhasil di hapus selamanya !']);
        }catch (Exception $e){
            return redirect('/pengaturan/')->with(['gagal' => 'Gagal dihapus']);
        }
    }
}
