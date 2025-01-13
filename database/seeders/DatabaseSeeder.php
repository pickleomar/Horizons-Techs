<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Chat;
use App\Models\History;
use App\Models\Issue;
use App\Models\Rating;
use App\Models\Subscription;
use App\Models\Theme;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(5)->create();
        Theme::factory(10)->create();
        Article::factory(10)->create();
        Rating::factory(20)->create();
        Chat::factory(10)->create();
        Subscription::factory(10)->create();
        History::factory(10)->create();
    }
}