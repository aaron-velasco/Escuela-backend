<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Alumno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'uuid'              => $this->faker->uuid,
            'nombre'            => $this->faker->name,
            'apellidos'         => $this->faker->lastName . $this->faker->lastName,
            'direccion'         => $this->faker->streetAddress,
            'poblacion'         => $this->faker->city,
            'codigo_postal'     => rand(10000,50000),
            'curso'             => 'Curso' . rand(1,10),
        ];
    }
}