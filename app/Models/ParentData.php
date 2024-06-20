<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentData extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_register_id',
        'father_name',
        'father_nik',
        'father_birth_place',
        'father_birth_date',
        'father_education',
        'father_job',
        'father_income',
        'father_address_rt',
        'father_address_rw',
        'father_address_hamlet',
        'father_address_village',
        'father_address_subdistrict',
        'father_address_regency',
        'mother_name',
        'mother_nik',
        'mother_birth_place',
        'mother_birth_date',
        'mother_education',
        'mother_job',
        'mother_income',
        'mother_address_rt',
        'mother_address_rw',
        'mother_address_hamlet',
        'mother_address_village',
        'mother_address_subdistrict',
        'mother_address_regency',
    ];

    public function studentRegister(){
        return $this->belongsTo(StudentRegister::class);
    }
}
