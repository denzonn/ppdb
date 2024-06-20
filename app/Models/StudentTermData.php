<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTermData extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_register_id',
        'photo_akta',
        'photo_kk',
    ];

    public function studentRegister(){
        return $this->belongsTo(StudentRegister::class);
    }
}
