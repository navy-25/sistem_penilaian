<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai_Tugas extends Model
{
    use HasFactory;
    protected $table = 'Nilai_Tugas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_siswa',
        'id_kelas',
        'id_tugas',
        'nilai',
    ];
}
