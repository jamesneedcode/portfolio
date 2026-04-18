<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Skills
        $skills = [
            ['name' => 'PHP',        'icon' => 'php',        'category' => 'Backend',  'proficiency' => 92, 'order' => 1],
            ['name' => 'Laravel',    'icon' => 'laravel',    'category' => 'Backend',  'proficiency' => 90, 'order' => 2],
            ['name' => 'JavaScript', 'icon' => 'js',         'category' => 'Frontend', 'proficiency' => 85, 'order' => 3],
            ['name' => 'Vue.js',     'icon' => 'vue',        'category' => 'Frontend', 'proficiency' => 80, 'order' => 4],
            ['name' => 'React',      'icon' => 'react',      'category' => 'Frontend', 'proficiency' => 75, 'order' => 5],
            ['name' => 'MySQL',      'icon' => 'mysql',      'category' => 'Database', 'proficiency' => 88, 'order' => 6],
            ['name' => 'PostgreSQL', 'icon' => 'postgresql', 'category' => 'Database', 'proficiency' => 78, 'order' => 7],
            ['name' => 'Docker',     'icon' => 'docker',     'category' => 'Tools',    'proficiency' => 72, 'order' => 8],
            ['name' => 'Git',        'icon' => 'git',        'category' => 'Tools',    'proficiency' => 95, 'order' => 9],
            ['name' => 'Tailwind',   'icon' => 'tailwind',   'category' => 'Frontend', 'proficiency' => 88, 'order' => 10],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }

        // Projects
        $projects = [
            [
                'title'            => 'E-Commerce Platform',
                'description'      => 'A full-featured online store with cart, checkout, and payment integration.',
                'long_description' => 'Built with Laravel and Vue.js, this platform supports multiple product categories, user authentication, Stripe payment processing, order management, and an admin dashboard for inventory control.',
                'image'            => null,
                'technologies'     => ['Laravel', 'Vue.js', 'MySQL', 'Stripe', 'Tailwind CSS'],
                'github_url'       => 'https://github.com',
                'live_url'         => 'https://example.com',
                'category'         => 'Web',
                'featured'         => true,
                'order'            => 1,
            ],
            [
                'title'            => 'Task Management API',
                'description'      => 'A RESTful API for managing tasks, teams, and projects with JWT authentication.',
                'long_description' => 'A robust REST API built with Laravel that powers a task management system. Features include JWT auth, role-based permissions, real-time notifications via WebSockets, and extensive API documentation.',
                'image'            => null,
                'technologies'     => ['Laravel', 'PHP', 'PostgreSQL', 'JWT', 'Redis'],
                'github_url'       => 'https://github.com',
                'live_url'         => null,
                'category'         => 'API',
                'featured'         => true,
                'order'            => 2,
            ],
            [
                'title'            => 'Real-Time Chat App',
                'description'      => 'A modern chat application with real-time messaging and user presence indicators.',
                'long_description' => 'Built using Laravel Echo and Pusher for real-time communication. Features include group chats, direct messages, file sharing, and emoji reactions.',
                'image'            => null,
                'technologies'     => ['Laravel', 'React', 'Pusher', 'MySQL', 'WebSockets'],
                'github_url'       => 'https://github.com',
                'live_url'         => 'https://example.com',
                'category'         => 'Web',
                'featured'         => true,
                'order'            => 3,
            ],
            [
                'title'            => 'Portfolio CMS',
                'description'      => 'A content management system specifically designed for developer portfolios.',
                'long_description' => 'A headless CMS with a clean API layer, allowing developers to manage their portfolio content from any frontend framework.',
                'image'            => null,
                'technologies'     => ['Laravel', 'PHP', 'SQLite', 'REST API'],
                'github_url'       => 'https://github.com',
                'live_url'         => null,
                'category'         => 'API',
                'featured'         => false,
                'order'            => 4,
            ],
            [
                'title'            => 'Mobile Budget Tracker',
                'description'      => 'A cross-platform mobile app for tracking personal finances and budgets.',
                'long_description' => 'Built with a Laravel backend and React Native frontend, this app helps users track income, expenses, set budgets, and visualize spending trends with beautiful charts.',
                'image'            => null,
                'technologies'     => ['Laravel', 'React Native', 'MySQL', 'Chart.js'],
                'github_url'       => 'https://github.com',
                'live_url'         => 'https://example.com',
                'category'         => 'Mobile',
                'featured'         => false,
                'order'            => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
