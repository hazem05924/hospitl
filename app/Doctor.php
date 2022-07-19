<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'first_name','last_name','email', 'password','national_id','address','picture','birth_date','gender','phone','mobile','emergency','type','medical_degree','specialist','biography','educational_qualification','blood_group'
    ];

    public function departments(){
        return $this->belongsToMany(Department::class,"doctor_has_departments");
    }
    public function patients(){
        return $this->hasMany(User::class);
    }
}
