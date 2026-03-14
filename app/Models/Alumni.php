<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    // Mengizinkan semua kolom diisi manual
    protected $guarded = [];

    // Relasi ke hasil tracking
    public function trackingResults() {
        return $this->hasMany(TrackingResult::class);
    }
}