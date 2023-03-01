<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolio Showcase',
            'slug' => 'portfolio-showcase',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(4),
            'category_id' => 3,
            'color' => 'sky-600'
        ]);
        Project::create([
            'title' => 'SSD Yearbook',
            'slug' => 'ssd-yearbook',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 1,
            'color' => 'amber-600'
        ]);
        Project::create([
            'title' => 'Movie Mania',
            'slug' => 'moive-mania',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(5),
            'color' => 'rose-600'
        ]);
        Project::create([
            'title' => 'News Site Homepage',
            'slug' => 'news-site-homepage',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'color' => 'purple-700'
        ]);
        Project::create([
            'title' => 'JavaScript Game',
            'slug' => 'js-game',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'category_id' => 2,
            'color' => 'teal-600'
        ]);
        Project::create([
            'title' => 'iOS App',
            'slug' => 'ios-app',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'color' => 'pink-600'
        ]);
        Project::create([
            'title' => 'Android App',
            'slug' => 'android-app',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(),
            'color' => 'cyan-600',
        ]);
        Project::create([
            'title' => 'Industry Project',
            'slug' => 'industry-project',
            'excerpt' => fake()->sentences(2, true),
            'body' => $this->fakeHTMLParagraphs(6),
            'category_id' => 3,
            'color' => 'lime-600'
        ]);
    }

    protected function fakeHTMLParagraphs($count = 3) {
        $bodyArray = fake()->paragraphs($count);
        $body = '<p>' . join('</p></p>', $bodyArray ) . '</p>';
        return $body;
    }
}
