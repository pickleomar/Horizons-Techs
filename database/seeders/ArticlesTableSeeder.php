<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert dummy articles into the 'articles' table
        DB::table('articles')->insert([
            [
                'title' => 'Introduction to Artificial Intelligence',
                'content' => 'Artificial Intelligence (AI) is revolutionizing the world...',
                'image' => 'images/1737052939.png',
                'theme_id' => 1, // Assuming a theme with ID 1 exists
                'author_id' => 1, // Assuming a user with ID 1 exists
                'status' => 'Published',
                'publication_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top 10 Travel Destinations in 2023',
                'content' => 'Here are the top 10 travel destinations you should visit in 2023...',
                'image' => 'https://static.vecteezy.com/system/resources/previews/008/351/302/non_2x/data-center-server-banner-set-isometric-style-vector.jpg',
                'theme_id' => 3, // Assuming a theme with ID 3 exists
                'author_id' => 2, // Assuming a user with ID 2 exists
                'status' => 'Approved',
                'publication_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Healthy Eating Habits',
                'content' => 'Maintaining a healthy diet is essential for a balanced lifestyle...',
                'image' => 'https://static.vecteezy.com/system/resources/thumbnails/018/913/684/small_2x/abstract-dark-technology-background-with-circuit-diagram-and-fingerprint-vector.jpg',
                'theme_id' => 2, // Assuming a theme with ID 2 exists
                'author_id' => 3, // Assuming a user with ID 3 exists
                'status' => 'Pending',
                'publication_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Future of Renewable Energy',
                'content' => 'Renewable energy is the key to a sustainable future...',
                'image' => 'https://static.vecteezy.com/system/resources/previews/008/857/678/non_2x/data-center-network-concept-banner-isometric-style-vector.jpg',
                'theme_id' => 4, // Assuming a theme with ID 4 exists
                'author_id' => 4, // Assuming a user with ID 4 exists
                'status' => 'Rejected',
                'publication_date' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->command->info('Articles table seeded successfully!');
    }
}