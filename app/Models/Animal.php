<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     //creates a template for our toy entity creating attributes, these display as columns in the database
    //             'animal_name',
    //             'size',
    //             'country_origin',
    //         ];
    public function toys(){
        return $this->hasMany(Toy::class);
    }
}
