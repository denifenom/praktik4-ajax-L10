<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DataSample;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataSample>
 */
class DataSampleFactory extends Factory
{
    protected $model = DataSample::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor' => fake()->postcode(),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'telp' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
