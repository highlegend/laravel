<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use Illuminate\Support\Str;

class VilleFactory extends Factory
{
    protected $model = Ville::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->country(),
            
        ];
    }
}
