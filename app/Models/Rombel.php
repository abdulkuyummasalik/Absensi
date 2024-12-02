<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = ['rombel'];

    public function getRouteKeyName()
    {
      return 'rombel';
    }

    public function student()
    {
      return $this->hasMany(Student::class, 'rombel_id', 'id');
    }
}
