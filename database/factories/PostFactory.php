<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class ModelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        $title = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
        return [
        'title' => $this->faker->title,
        'slug' => Str::slug($title),
        'content' => $this->faker->text($maxNbChars = 200)
        ];
    }
}

