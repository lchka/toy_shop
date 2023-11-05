<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ToyFactory extends Factory
{
    
    /**  Creates our model 'toy' datatypes, which give meaning to the attributes*/
    /**
    
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence, //makes sure the name is n o longer than a sentence
            'description'=>fake()->paragraph,// makes sure the desacription is atleast a paragraph
            'colour'=>fake()->randomElement(['red', 'green', 'mixed','black','white','orange','purple','blue','yellow','pink','brown']),//randomElement acts as an enum
            'size'=>fake()->randomElement(['small', 'medium', 'large']),//cant use enum for fake/faker, must use randomElement
            'type'=>fake()->word,//makes sure the fake is a single word
            'company_name'=>fake()->word,//makes sure the fake is a single word
            'toy_image'=>fake()->imageUrl,//makes sure the fake is ana iamge
            'created_at'=> now(),
            'updated_at'=> now(),
        ];
    }
}
