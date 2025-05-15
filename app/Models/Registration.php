<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'student_id', 'package_id', 'start_date', 'end_date', 'is_active', 'note',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function drivingLessons()
    {
        return $this->hasMany(DrivingLesson::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
