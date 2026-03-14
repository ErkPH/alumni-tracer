<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingResult extends Model
{
    // Tambahkan baris ini untuk memberikan izin pengisian data
    protected $guarded = [];

    // Relasi balik ke Alumni
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}