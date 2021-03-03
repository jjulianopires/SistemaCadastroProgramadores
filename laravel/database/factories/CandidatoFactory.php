<?php

namespace Database\Factories;

use App\Models\Candidato;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tec = array('java','php','javascript');
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'idade' => random_int(5, 100),
            'linkedin' => $this->faker->url,
            'tecnologias' => json_encode($tec),
        ];
    }
}
