<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        fake()->addProvider(new SchoolFakerProvider(fake()));

        $initialNumber = 28000029;
        $finalNumber = 6627460841;
        $email = fake()->email();

        return [
            'hs_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'director_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'mec_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'country_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'region_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'city_id' => fake()->numberBetween($initialNumber, $finalNumber),
            'name' => fake()->schoolName(),
            'postal' => fake()->postcode(),
            'phone' => fake()->phoneNumber(),
            'password' => Hash::make(fake()->password()),
            'email' => $email,
            'email2' => $email,
            'website' => fake()->url(),
            'fax' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'address_short' => fake()->streetAddress(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'plan_preference' => fake()->randomElement(['anual', 'mensual']),
            'leads' => fake()->numberBetween(0, 1000),
            'business_status' => fake()->randomElement(['OPERATIONAL', 'CLOSED_PERMANENTLY']),
            'google_user_ratings_total' => fake()->numberBetween(0, 2000),
            'google_rating' => fake()->randomFloat(1, 0, 5),
            'revisor' => fake()->name(),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
