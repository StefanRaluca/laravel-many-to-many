<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //Project::truncate();

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->words(4, true);
            $newProject->slug = Str::of($newProject->title)->slug('-');
            $newProject->image_cover = $faker->imageUrl(400, 400, 'Projects', true, $newProject->title, true, 'png');
            $newProject->description = $faker->paragraph();
            $newProject->start_date = $faker->date();
            $newProject->preview_url = $faker->imageUrl(400, 400, 'Projects', true, $newProject->title, true, 'png');
            $newProject->url_code = $faker->url();
            $newProject->team_members = $faker->name();
            $newProject->save();
        }
    }
}