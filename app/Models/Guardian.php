<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_register_id',
        'name',
        'birth_place',
        'birth_date',
        'education',
        'job',
        'address_rt',
        'address_rw',
        'address_hamlet',
        'address_village',
        'address_subdistrict',
        'address_regency',
    ];

    public function studentRegister(){
        return $this->belongsTo(StudentRegister::class);
    }
}
