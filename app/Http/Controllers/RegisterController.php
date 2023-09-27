<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use \StudioKaa\Amoclient\Facades\AmoAPI;

class RegisterController extends Controller
{
    public function registerClasses(){
        $APIClasses = json_decode(AmoAPI::get('groups'), true);
        $savedClasses = SchoolClass::all()->pluck('name');

        foreach($APIClasses as $class){
            if(!$savedClasses->contains($class['name'])){
                $newClass = new SchoolClass();
                $newClass->name = $class['name'];
                $newClass->save();
            }
        }

        return;
    }
}
