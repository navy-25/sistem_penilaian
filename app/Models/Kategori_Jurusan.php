<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Jurusan extends Model
{
    use HasFactory;
    protected $table = 'Kategori_Jurusan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id_siswa',
    ];
}
