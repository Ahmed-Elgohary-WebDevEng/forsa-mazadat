<?php

namespace Database\Factories;

use App\Models\Auctions;
use App\Models\UserLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class UserLogFactory extends Factory
{
    protected $model = UserLog::class;

    public function definition(): array
    {
        return [
//            'slug' => $this->faker->slug(),
            'auction_id' => Auctions::inRandomOrder()->first(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'identity' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
