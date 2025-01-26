<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            // Seed users
            $this->seedUsers();

            // Seed themes
            $this->seedThemes();

            // Seed articles
            $this->seedArticles();

            // Seed issues
            $this->seedIssues();

            $this->command->info('All tables seeded successfully!');
        } catch (\Exception $e) {
            Log::error('Seeding error: ' . $e->getMessage());
            $this->command->error('Seeding failed: ' . $e->getMessage());
        }
    }

    /**
     * Seed the users table.
     */
    private function seedUsers(): void
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

        $this->command->info('Users table seeded successfully!');
    }

    /**
     * Seed the themes table.
     */
    private function seedThemes(): void
    {
        DB::table('themes')->insert([
            [
                'name' => 'Cybersecurity',
                'description' => 'This cybersecurity theme explores the latest threats, vulnerabilities, and defense strategies, covering topics like ransomware, phishing, and AI-driven attacks. It provides actionable insights to help professionals and enthusiasts stay ahead in the evolving digital security landscape..',
                'manager_id' => 1, 
                'image' => 'https://slidebazaar.com/wp-content/uploads/2022/09/cyber-security-powerpoint-template-jpg.webp0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Artificial Intelligence',
                'description' => 'This theme explores the transformative impact of artificial intelligence on industries, ethics, and future innovations.',
                'manager_id' => 2, 
                'image' => 'https://cms.trustmark.org.uk/media/h34dkakg/adobestock_265254915.jpeg?width=954&height=362&rnd=133440215261700000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'IoT: Internet of Things',
                'description' => 'This theme delves into the Internet of Things (IoT), covering smart devices, connectivity, security challenges, and its role in shaping a connected future.',
                'manager_id' => 3, 
                'image' => 'https://etimg.etb2bimg.com/photo/90623301.cms',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Programming Language C++',
                'description' => 'This theme focuses on the C++ programming language, exploring its advanced features, performance optimization, and applications in software development.',
                'manager_id' => 4, 
                'image' => 'https://training.digigrowhub.in/wp-content/uploads/2021/02/do-coding-of-any-program-by-c-plus-plus-perfectly-and-within-time.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $this->command->info('Themes table seeded successfully!');
    }

    /**
     * Seed the articles table.
     */
    private function seedArticles(): void
    {
        DB::table('articles')->insert(
            [
                [
                    'title' => 'The Rise of AI in Cybersecurity',
                    'content' => 'Artificial Intelligence is revolutionizing the field of cybersecurity. From detecting anomalies in network traffic to predicting potential threats, AI is becoming an indispensable tool for protecting digital assets. This article explores how AI is being used to combat cyber threats and what the future holds for AI-driven security solutions.',
                    'image' => 'https://picsum.photos/800/400',
                    'theme_id' => 1, // Cybersecurity
                    'author_id' => 1,
                    'status' => 'Published',
                    'publication_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'How AI is Transforming Industries',
                    'content' => 'Artificial Intelligence is no longer just a buzzword; it’s transforming industries across the globe. From healthcare to finance, AI is driving innovation and efficiency. This article delves into the latest advancements in AI and how they are reshaping the way we work and live.',
                    'image' => 'https://static.vecteezy.com/system/resources/previews/008/351/302/non_2x/data-center-server-banner-set-isometric-style-vector.jpg',
                    'theme_id' => 2, // AI
                    'author_id' => 2,
                    'status' => 'Approved',
                    'publication_date' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Securing IoT Devices in a Connected World',
                    'content' => 'The Internet of Things (IoT) is growing rapidly, but so are the security risks associated with it. This article examines the vulnerabilities of IoT devices and provides practical tips for securing them. From smart homes to industrial IoT, learn how to protect your connected devices from cyber threats.',
                    'image' => 'https://static.vecteezy.com/system/resources/thumbnails/018/913/684/small_2x/abstract-dark-technology-background-with-circuit-diagram-and-fingerprint-vector.jpg',
                    'theme_id' => 3, // IoT
                    'author_id' => 3,
                    'status' => 'Pending',
                    'publication_date' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title' => 'Advanced C++ Techniques for Modern Software Development',
                    'content' => 'C++ remains one of the most powerful programming languages, especially for performance-critical applications. This article explores advanced C++ techniques, including memory management, template metaprogramming, and concurrency. Whether you’re a beginner or an experienced developer, these insights will help you write more efficient and maintainable code.',
                    'image' => 'https://static.vecteezy.com/system/resources/previews/008/857/678/non_2x/data-center-network-concept-banner-isometric-style-vector.jpg',
                    'theme_id' => 4, // C++
                    'author_id' => 4,
                    'status' => 'Rejected',
                    'publication_date' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
        ]);

        $this->command->info('Articles table seeded successfully!');
    }

    /**
     * Seed the issues table.
     */
    private function seedIssues(): void
    {
        DB::table('issues')->insert([[
            'title' =>'Through the Digital Abyss issue',
            'image'=>'https://i.pinimg.com/736x/52/1d/eb/521debe074b5196063c3494a97ef5fa2.jpg',
            'description'=>'This magazine issue appears to focus on the intersection of artificial intelligence (AI)
             and security, particularly in a dystopian context. 
             It explores themes such as the fragility of future security, 
             the challenges posed by AI, and the potential collapse of trust in digital systems. 
             Topics likely include the paradoxes of cybersecurity, navigating the complexities of the digital age, and the implications of AI on societal trust and safety. 
             The issue seems to offer a critical perspective on how AI could shape a potentially unstable future.',
            'publication_date'=>now(),
            'public'=> 1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ],
        [
            'title' =>'Insights in Science and Technology issue',
            'image'=>'https://bpb-us-e2.wpmucdn.com/sites.utdallas.edu/dist/a/1165/files/2021/03/issues-cover-summer-600-2016-08.jpg',
            'description'=>"This issue of the magazine delves into a variety of pressing topics at the intersection of science, technology, and policy. It explores the evolving global environment for space policy, lessons from Donald Trump's approach to governance, and the role of civil society in managing public health crises. Additionally, it examines the economic valuation of ecosystem services, the political dynamics of the Chemical Safety Board, and the potential for more energy-efficient buildings. The issue also touches on the influence of celebrities in the realm of science, offering a comprehensive look at how these diverse elements shape our world",
            'publication_date'=>now(),
            'public'=> 1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ],
        [
            'title' =>'Tech Journal - A Trends Report Special: The Human Touch issue',
            'image'=>'https://media-s3-us-east-1.ceros.com/insight-uk/images/2024/03/25/9b74e94fb9f0d773a4eb2fe23ff785fa/be-cover.png?imageOpt=1',
            'description'=>" This special issue of Tech Journal focuses on humanizing the digital customer experience, emphasizing the importance of personal touch in an increasingly digital world. It includes insights from the 2024 Trends Report, exploring key trends and strategies for enhancing customer engagement. The issue also addresses the reduction of financial risk in IT through the integration of FinOps and GreenOps, highlighting the intersection of financial operations and sustainable practices. This edition aims to provide valuable perspectives on balancing technological advancements with human-centric approaches.",
            'publication_date'=>now(),
            'public'=> 1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ],
        [
            'title' =>'National Academies of Sciences, Engineering, and Medicine issue',
            'image'=>'https://issues.org/wp-content/uploads/2018/10/Fall-2018-Cover-1200x1536.jpg',
            'description'=>" This issue features a special report on the continuing challenge of Alzheimer's disease, highlighting ongoing research and developments in understanding and addressing this condition. It also explores the future of work, examining how advancements in science and technology are reshaping the labor market and workplace dynamics. The publication includes contributions from prestigious institutions such as The University of Texas at Dallas and Arizona State University, offering a comprehensive look at critical issues at the intersection of science, technology, and society.",
            'publication_date'=>now(),
            'public'=> 1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ],
        ]);
        $this->command->info('Issues table seeded successfully!');
    }
}