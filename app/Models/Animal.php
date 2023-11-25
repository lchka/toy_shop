<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toy;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['animal_name', 'size', 'country'];
    public function toys(){
        return $this->hasMany(Toy::class);
    }
}
