<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenSakit extends Model
{
    use HasFactory;

    protected $table = 'absen_sakits';

    protected $fillable = [
        'nis_id', 'absen_id', 'alasan_s', 'surat_dokter'
    ];
    
    public function absen()
    {
      return $this->belongsTo(Absen::class, 'absen_id', 'id');
    }
}
