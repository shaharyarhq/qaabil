<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Objective;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'status' => UserStatus::APPROVED
        ]);

        $user2 = User::create([
            'name' => 'Student',
            'email' => 'ahmedshaharyar00@gmail.com',
            'password' => 'ahmedshaharyar00@gmail.com',
            'email_verified_at' => now()
        ]);

        $user3 = User::create([
            'name' => 'Moderator',
            'email' => 'shaharyarahmed557@gmail.com',
            'password' => 'shaharyarahmed557@gmail.com',
            'email_verified_at' => now()
        ]);


        $superAdminRole = Role::create([
            'name' => UserRole::SUPER_ADMIN
        ]);

        $studentRole = Role::create([
            'name' => UserRole::STUDENT
        ]);

        $moderatorRole = Role::create([
            'name' => UserRole::MODERATOR,
        ]);

        $user->assignRole($superAdminRole);
        $user2->assignRole($studentRole);
        $user3->assignRole($moderatorRole);

        // Create Laravel Course
        $course = Course::create([
            'name' => 'Laravel Framework',
            'description' =>
            'Master the fundamentals of the Laravel PHP framework. This course covers routing, controllers, Blade templating, Eloquent ORM, and building modern web applications.'
        ]);

        // Chapters for Laravel course
        $chapters = [
            'Introduction to Laravel' => [
                'Understand MVC Architecture',
                'Install Laravel',
                'Explore Laravel directory structure'
            ],
            'Routing & Controllers' => [
                'Define routes',
                'Create controllers',
                'Route parameters and naming'
            ],
            'Blade Templating' => [
                'Create Blade views',
                'Use Blade directives',
                'Template inheritance'
            ],
            'Database & Eloquent ORM' => [
                'Migrations and schema',
                'Eloquent models',
                'Relationships between models'
            ],
            'Authentication & Authorization' => [
                'User registration and login',
                'Middleware',
                'Gates and policies'
            ],
            'APIs & JSON Responses' => [
                'Create API routes',
                'Use Resource classes',
                'Handle JSON requests and responses'
            ],
            'Testing & Debugging' => [
                'Write unit tests',
                'Use factories and seeders',
                'Debug with Laravel Telescope'
            ],
        ];

        foreach ($chapters as $chapterName => $objectives) {
            $chapter = Chapter::create([
                'name' => $chapterName,
                'course_id' => $course->id,
            ]);

            foreach ($objectives as $objectiveName) {
                Objective::create([
                    'name' => $objectiveName,
                    'chapter_id' => $chapter->id,
                ]);
            }
        }
    }
}
