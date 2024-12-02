<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'user_id', 
    ];

    public function detail()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
