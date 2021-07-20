<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;
    protected $table = 'Modul';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kelas',
        'name',
        'jenis',
        'file',
    ];
    public function getFile(){
        if($this->file != null){
            return asset('modul/'.$this->file);
        }
    }
}
