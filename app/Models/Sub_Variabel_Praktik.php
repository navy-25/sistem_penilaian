<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Variabel_Praktik extends Model
{
    use HasFactory;
    protected $table = 'Sub_Variabel_Praktik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'id_variabel_praktik',
        'deskripsi'
    ];
}
