<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petstore extends Model
{
    use HasFactory;

    public function toys()
    {
    return $this->belongsToMany(Toy::class)->withTimestamps();
    }
}
