<?php
// model for the toy entity
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toy extends Model
{
    use HasFactory;
    protected $fillable = [
//creates a template for our toy entity creating attributes, these display as columns in the database
        'name',
        'description',
        'colour',
        'size',
        'type',
        'toy_image'
    ];
}
