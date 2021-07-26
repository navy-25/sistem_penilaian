<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_Tugas_Siswa extends Model
{
    use HasFactory;
    protected $table = 'File_Tugas_Siswa';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_siswa',
        'id_kelas',
        'id_tugas',
        'file',
    ];
    public function getFile(){
        if($this->file != null){
            return asset('modul/siswa/'.$this->file);
        }
    }
}
