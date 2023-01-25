<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $package = fake()->unique()->firstName();
        return [
            'package' => $package,
            'price' => fake()->numberBetween(10000, 1000000),
            'note' => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat neque vitae ullam. Harum sed numquam perferendis molestias consectetur error eligendi? Quidem eveniet unde quam enim non ut quaerat excepturi. Aliquid.",
            'slug' => Str::slug($package),
        ];
    }
}
