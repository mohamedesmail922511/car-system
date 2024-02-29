<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invoice_type'=>$this->faker->randomElement($array = array ('Cash','Quatation','Debit')),
            'name'=>$this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'phone'=>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'car_no'=>$this->faker->randomNumber(),
            'car_type'=>$this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'service'=>$this->faker->sentence($nbWords = 1, $variableNbWords = true),
            'car_description'=>$this->faker->sentence($nbWords = 8, $variableNbWords = true),
            'price'=>$this->faker->randomNumber(),
            'note'=>$this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'images'=>$this->faker->imageUrl($width = 640, $height = 480),
            'receivedـdate'=>$this->faker->dateTime($max = 'now', $timezone = null),
            'deliveryـdate'=>$this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
