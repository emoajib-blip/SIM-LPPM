<?php

namespace Database\Factories;

use App\Models\Keyword;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Keyword>
 */
class KeywordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $keywords = [
            'Machine Learning',
            'Internet of Things',
            'Blockchain',
            'Artificial Intelligence',
            'Big Data',
            'Cloud Computing',
            'Cybersecurity',
            'Data Mining',
            'Energi Terbarukan',
            'Pertanian Organik',
            'Ketahanan Pangan',
            'Ekonomi Kreatif',
            'UMKM',
            'Pemberdayaan Masyarakat',
            'Kesehatan Masyarakat',
            'Gizi',
            'Sanitasi',
            'Pendidikan Karakter',
            'Literasi Digital',
            'Pembelajaran Daring',
        ];

        return [
            'name' => fake()->unique()->randomElement($keywords),
        ];
    }
}
