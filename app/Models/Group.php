<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_group', 'group_id', 'student_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
