<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentData extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_register_id',
        'fullname',
        'name',
        'gender',
        'nik',
        'birth_place',
        'birth_date',
        'old_school',
        'religion',
        'address_rt',
        'address_rw',
        'address_hamlet',
        'address_village',
        'address_subdistrict',
        'address_regency',
        'living_together',
        'no_telp',
        'child_order',
        'siblings',
        'hobby',
        'goal',
    ];

    public function studentRegister(){
        return $this->belongsTo(StudentRegister::class);
    }
}
