<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniLengkap extends Model
{
    use HasFactory;

    protected $table = 'data_alumni_lengkap';

    protected $fillable = [
        'nama', 'email', 'no_hp', 'linkedin', 'instagram', 'facebook', 
        'tiktok', 'tempat_bekerja', 'alamat_bekerja', 'posisi', 
        'status_kerja', 'sosmed_kantor'
    ];
}