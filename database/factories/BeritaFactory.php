<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'title'=>$this->faker->sentence(mt_rand(2,4)),
                'excerpt'=>$this->faker->paragraph(mt_rand(2,3)),
                'body'=>$this->faker->paragraph(mt_rand(5,10)),
                'user_id'=>mt_rand(1,5),
                'kategori_id'=>mt_rand(1,2),
        ];
    }
}
