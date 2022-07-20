<?php

namespace App\Http\Controllers;

use App\Department;
use App\Doctor;
use App\TimeSchedule;
use App\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function viewBook(){
        return view('appointments.book')
            ->with('doctors', Doctor::get())
            ->with('patients', User::patient()->get())
            ->with('departments', Department::all())
            ->with('timeschedules', TimeSchedule::all());
    }
}
