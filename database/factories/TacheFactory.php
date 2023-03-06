<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TacheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createAt = fake()-> dateTimeInInterval(
            $startDate = "-6 months",
            $interval = "+ 180 days" ,
            $timezone=date_default_timezone_get()
        );
        return [
            'expiration' =>fake()->dateTimeInInterval(
                $startDate = '-6 months',
                $interval = "+ 180 days" ,
                $timezone=date_default_timezone_get()
            ),
            'categorie' => fake()->randomElement($array=array('Urgent',"A Fair","Optionnel")),
            'description' =>fake()->paragraph,
            'accomplie' =>fake()->randomElement($array=array("O","N")),
            'created_at' => $createAt,
            'updated_at' =>fake()->dateTimeInInterval(
                $startDate = $createAt ,
                $interval = $createAt->diff(new \DateTime('now'))->format("%R%a days"),
                $timezone = date_default_timezone_get()
            )
        ];
    }


}
