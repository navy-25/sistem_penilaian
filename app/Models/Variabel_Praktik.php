<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variabel_Praktik extends Model
{
    use HasFactory;
    protected $table = 'Variabel_Praktik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id_kelas',
    ];
}
