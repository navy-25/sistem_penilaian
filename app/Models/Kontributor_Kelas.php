<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontributor_Kelas extends Model
{
    use HasFactory;
    protected $table = 'Kontributor_Kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_kelas',
        'id_guru',
        'id_siswa',
    ];
}
