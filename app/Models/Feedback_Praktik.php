<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback_Praktik extends Model
{
    use HasFactory;
    protected $table = 'Feedback_Praktik';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_siswa',
        'id_kelas',
        'id_variabel_praktek',
        'red_1',
        'red_2',
        'red_3',
        'vid_1',
        'vid_2',
        'catatan'
    ];
}