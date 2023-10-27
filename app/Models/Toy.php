<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//creates a template for our toy entity. Including attributes
class Toy extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'description',
        'colour',
        'size',
        'type',
        'toy_image'
    ];
}
