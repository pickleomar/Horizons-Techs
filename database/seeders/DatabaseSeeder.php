<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => 'editor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sanae Amari',
                'email' => 'sanae@example.com',
                'password' => Hash::make('password'),
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jawad Amari',
                'email' => 'jawad@example.com',
                'password' => Hash::make('password'),
                'role' => 'subscriber',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // You can add more data as needed
        $this->command->info('Users seeded successfully!');

        DB::table('themes')->insert([
            [
                'name' => 'Technology',
                'description' => 'Articles related to the latest technology trends.',
                'manager_id' => 1, // Assuming a user with ID 1 exists
                "image" => "https://picsum.photos/800/400",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artificiel Inteligent',
                "image" => "images/1737052807.jpg",
                'description' => 'Articles about Artificiel Inteligent',
                'manager_id' => 2, // Assuming a user with ID 2 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Iot : Internet of thins',
                "image" => "https://picsum.photos/800/400",

                'description' => 'Articles about Iot : Internet of thins',
                'manager_id' => 3, // Assuming a user with ID 3 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programming Language C++',
                "image" => "images/1737052807.jpg",

                'description' => 'Articles about Programming Language C++',
                'manager_id' => 4, // Assuming a user with ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DevOPS and Cloud',
                "image" => "https://picsum.photos/800/400",
                'description' => 'Articles about DevOPS and Cloud',
                'manager_id' => 4, // Assuming a user with ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Computer Science',
                "image" => "https://picsum.photos/800/400",
                'description' => 'Articles about Computer Science.',
                'manager_id' => 4, // Assuming a user with ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Github Tips and Tricks',
                'description' => 'Articles about Github Tips and Tricks',
                "image" => "https://picsum.photos/800/400",
                'manager_id' => 4, // Assuming a user with ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hello world',
                'description' => ' Some Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long Text Some Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long TextSome Long Text',
                "image" => "https://picsum.photos/800/400",
                'manager_id' => 4, // Assuming a user with ID 4 exists
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        $this->command->info('Themes table seeded successfully!');

        DB::table('articles')->insert([
            [
                'title' => 'Introduction to Artificial Intelligence',
                'content' => ' Web design is both an art and a science. It combines aesthetic creativity with technical expertise
                    to create
                    engaging and functional digital experiences. Modern web design focuses on user experience,
                    accessibility,
                    and responsive layouts that work seamlessly across all devices. From choosing the right color
                    palette to
                    implementing intuitive navigation systems, every detail matters in creating a successful website.',
                'image' => 'https://picsum.photos/800/400',
                'theme_id' => 1, // Assuming a theme with ID 1 exists
                'author_id' => 1, // Assuming a user with ID 1 exists
                'status' => 'Published',
                'publication_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Top 10 Travel Destinations in 2023',
                'content' => ' Web design is both an art and a science. It combines aesthetic creativity with technical expertise
                    to create
                    engaging and functional digital experiences. Modern web design focuses on user experience,
                    accessibility,
                    and responsive layouts that work seamlessly across all devices. From choosing the right color
                    palette to
                    implementing intuitive navigation systems, every detail matters in creating a successful website.',
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
                'content' => ' Web design is both an art and a science. It combines aesthetic creativity with technical expertise
                    to create
                    engaging and functional digital experiences. Modern web design focuses on user experience,
                    accessibility,
                    and responsive layouts that work seamlessly across all devices. From choosing the right color
                    palette to
                    implementing intuitive navigation systems, every detail matters in creating a successful website.',
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
                'content' => ' Web design is both an art and a science. It combines aesthetic creativity with technical expertise
                    to create
                    engaging and functional digital experiences. Modern web design focuses on user experience,
                    accessibility,
                    and responsive layouts that work seamlessly across all devices. From choosing the right color
                    palette to
                    implementing intuitive navigation systems, every detail matters in creating a successful website.',
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
