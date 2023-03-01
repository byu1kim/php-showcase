<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'name' => 'Node.js',
            'slug' => 'node',
        ]);
        Tag::create([
            'name' => 'PHP',
            'slug' => 'php',
        ]);
        Tag::create([
            'name' => 'Javascript',
            'slug' => 'js',
        ]);
        Tag::create([
            'name' => 'React',
            'slug' => 'react',
        ]);
        Tag::create([
            'name' => 'CSS',
            'slug' => 'css',
        ]);
        Tag::create([
            'name' => 'Sass',
            'slug' => 'sass',
        ]);
        Tag::create([
            'name' => 'Tailwind',
            'slug' => 'tailwind',
        ]);
        Tag::create([
            'name' => 'C#',
            'slug' => 'c',
        ]);
        Tag::create([
            'name' => 'jQuery',
            'slug' => 'jquery',
        ]);
        Tag::create([
            'name' => 'Bootstrap',
            'slug' => 'bootstrap',
        ]);

    }
}
