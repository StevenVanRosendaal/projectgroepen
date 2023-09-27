<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Project;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Database\Seeder;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $classes = SchoolClass::factory(5)->create();

        foreach($classes as $class) {

            $students = Student::factory(20)->create([
                'class_id' => $class->id,
            ]);

            $projects = Project::factory(5)->create([
                'class_id' => $class->id,
            ]);

            foreach($projects as $project) {
                $groups = Group::factory(5)->create([
                    'project_id' => $project->id,
                ]);

                $currentStudents = $students->random($project->max_group_size);

                foreach($currentStudents as $student) {
                    $project->groups()->attach($student, ['created_at' => now(), 'updated_at' => now()]);
                }
            }
        }
    }
}
