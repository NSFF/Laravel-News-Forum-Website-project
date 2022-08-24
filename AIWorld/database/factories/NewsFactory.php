<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(15),
            'user_id' => User::all()->random()->id,
            // in case you want to get random images
            //'image_path' => 'https://source.unsplash.com/random/1000x640',
            'image_path' => '1660867068-3dArt.jpg'
        ];
    }
}
