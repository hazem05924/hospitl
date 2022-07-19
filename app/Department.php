<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name','description'
    ];


    public function users(){
        return $this->belongsToMany(User::class);
    }

    // public function doctors(){
    //     return $this->belongsToMany(User::class)->Doctor();
    // }
    public function doctors(){
        return $this->belongsToMany(Doctor::class , 'doctor_has_departments');
    }

    public function patients(){
        return $this->belongsToMany(User::class)->Patient();
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function beds(){
        return $this->hasMany(Bed::class);
    }
}
