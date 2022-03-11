<?php

namespace Database\Factories;
use App\Models\Thank;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThankFactory extends Factory
{
    protected $model =Thank::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,10),
            'message'=>$this->faker->realText(50),
            'to_user_id' =>$this->faker->numberBetween(1,10),
        ];
    }
}
