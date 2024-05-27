<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Web Development',
                'slug' => Str::slug('Web Development', '-'),
                'description' => 'Projects related to AI development.',
                'active' => true,
            ],
            [
                'name' => 'Mobile App Dev',
                'slug' => Str::slug('Mobile App Dev', '-'),
                'description' => 'Projects related to mobile application.',
                'active' => true,
            ],
            [
                'name' => 'Graphic Design',
                'slug' => Str::slug('Graphic Design', '-'),
                'description' => 'Projects related to UI design.',
                'active' => true,
            ],
            [
                'name' => 'UI Canva',
                'slug' => Str::slug('Ui Canva', '-'),
                'description' => 'Projects related to UI design,for front-end develop',
                'active' => true,
            ]
        ];
        foreach ($types as $type) {
            Type::create($type);
        }
    }
}