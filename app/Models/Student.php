<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis', 
        'nama',
        'jk',
        'rombel_id',
        'rayon_id',
        'user_id',
    ];

    public function getRouteKeyName()
    {
      return 'nis';
    }

    public function detail()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function rombel()
    {
      return $this->belongsTo(Rombel::class, 'rombel_id', 'id');
    }

    public function rayon()
    {
      return $this->belongsTo(Rayon::class, 'rayon_id', 'id');
    }

    public function absen()
    {
      return $this->hasMany(Absen::class, 'nis_Id', 'id');
    }
}
