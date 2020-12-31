<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\VotablesTableSeeder;
use Database\Seeders\FavoritesTableSeeder;
use Database\Seeders\UsersQuestionsAnswersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersQuestionsAnswersTableSeeder::class,
            FavoritesTableSeeder::class,
            VotablesTableSeeder::class
        ]);
    }
}
