<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petstore extends Model
{
    use HasFactory;
    protected $fillable = [
        //creates a template for our toy entity creating attributes, these display as columns in the database
        'store_name',
        'location',
        'phone',
        'email',
       
    ];
    public function toys()
    {
    return $this->belongsToMany(Toy::class)->withTimestamps();
    }
}
