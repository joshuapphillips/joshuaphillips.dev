<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class CommunicationFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $content = [
            'name' => fake()->name(),
            'email_address' => fake()->email(),
            'company' => fake()->company(),
            'telephone_number' => fake()->phoneNumber(),
            'message' => fake()->text('500'),
        ];

        return [
            'content' => $content,
            'notified' => fake()->boolean(),
        ];
    }
}
