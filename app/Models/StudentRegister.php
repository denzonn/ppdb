<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_register',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function studentData(){
        return $this->hasOne(StudentData::class);
    }

    public function parentData(){
        return $this->hasOne(ParentData::class);
    }

    public function guardianData(){
        return $this->hasOne(Guardian::class);
    }

    public function termData(){
        return $this->hasOne(StudentTermData::class);
    }
}
