<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->fake->name,
            "avatar" => $this->fake->Str::random(10),
            "password" => $this->fake->password,
            "phone" => $this->fake->phoneNumber,
            "address" => $this->fake->address,
            "position" => $this->fake->Str::random(10),
            "gender" => $this->fake->Str::random(10),
            "city" => $this->fake->Str::random(10),
        ];
    }
}
