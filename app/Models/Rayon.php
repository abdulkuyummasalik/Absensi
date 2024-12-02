<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rayon extends Model
{
    use HasFactory;

    protected $fillable = ['rayon', 'pembimbing', 'no_hp_pembimbing'];

    public function getRouteKeyName()
    {
      return 'rayon';
    }

    public function student()
    {
      return $this->hasMany(Student::class, 'rayon_id', 'id');
    }
}
