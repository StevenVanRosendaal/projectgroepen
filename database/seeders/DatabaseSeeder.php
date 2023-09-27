<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\Project;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use PHPUnit\Framework\MockObject\Builder\Stub;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classes = SchoolClass::factory(5)->create();

        foreach($classes as $class) {

            $teacher = User::factory()->create([
                'id' => $faker->unique()->regexify('[a-z]{2}[0-9]{2}'),
                'type' => 'teacher',
            ])->schoolClasses()->attach($class);

            $students = User::factory(20)->create([
                'type' => 'student',
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
