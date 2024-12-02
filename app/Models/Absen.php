<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis_id',
        'tgl',
        'jam_kedatangan',
        'jam_kepulangan',
        'ket',
        'pulang'
    ];

    public function student()
    {
      return $this->belongsTo(Student::class, 'nis_id', 'id');
    }

    public function absen_izin()
    {
      return $this->hasMany(AbsenIzin::class, 'absen_id', 'id');
    }

    public function absen_sakit()
    {
      return $this->hasMany(AbsenSakit::class, 'absen_id', 'id');
    }
}
