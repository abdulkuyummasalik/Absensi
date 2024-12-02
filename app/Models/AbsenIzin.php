<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenIzin extends Model
{
    use HasFactory;

    protected $table = 'absen_izins';

    protected $fillable = [
        'nis_id', 'absen_id', 'alasan_i'
    ];

    public function absen()
    {
      return $this->belongsTo(Absen::class, 'absen_id', 'id');
    }
}
