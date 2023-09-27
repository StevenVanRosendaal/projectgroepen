<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Student;

class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'class_id');
    }
}
