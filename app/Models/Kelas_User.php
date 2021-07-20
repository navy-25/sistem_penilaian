<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas_User extends Model
{
    use HasFactory;
    protected $table = 'Kelas_User';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kelas',
        'jurusan',
        'id_siswa',
    ];
}
