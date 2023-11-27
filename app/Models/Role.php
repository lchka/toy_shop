<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//template for role
class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('User','user_role');
    }
}