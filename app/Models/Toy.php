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
        'company_name',
        'type',
        'toy_image',
        'animal_id'
    ];
    public function animal(){

        return $this->belongsTo(Animal::class);
    }
}
