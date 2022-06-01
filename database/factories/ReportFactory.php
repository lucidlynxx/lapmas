<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'classification_id' => mt_rand(1, 3),
            'user_id' => mt_rand(1, 5),
            'title' => $this->faker->sentence(mt_rand(2, 5)),
            'slug' => $this->faker->slug(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'lokKejadian' => $this->faker->address(),
            'Kategori' => $this->faker->words(3, true),
            'tglKejadian' => $this->faker->date('Y_m_d'),
            'image' => $this->faker->image(null, 640, 480),
        ];
    }
}
