<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'logo' => $this->faker->imageUrl(),
            'info_details' => $this->faker->phoneNumber(),
            'description' => $this->faker->paragraph(rand(3, 8))
        ];
    }
}
