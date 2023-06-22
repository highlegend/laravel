<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Etudient;
use App\Models\Ville;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EtudientFactory extends Factory
{

    protected $model = Etudient::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'datenaissance' => $this->faker->date(),
            'user_id' =>User::all()->random()->id,
            'ville_id' => Ville::all()->random()->id,
        ];
    }
}

