<?php

namespace Database\Factories;

use App\Models\Condominio;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CondominioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Condominio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name =$this->faker->company();
        return [
            'name'=>$name,
            'slug'=>Str::slug($name),
            'rut'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'phones'=>$this->faker->phoneNumber(),
            'mobil'=>$this->faker->e164PhoneNumber(),
            'email'=>$this->faker->email(),
            'logo'=>$this->faker->randomElement(['9.png','10.png','11.png','12.png']),
            'apartments'=>$this->faker->numberBetween($min = 80, $max = 200) ,
            'level'=>$this->faker->numberBetween($min = 10, $max = 20) ,
        ];
    }
}
