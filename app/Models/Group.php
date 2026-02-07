<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'days',
        'description',
        'season_id',
        'shift_id',
        'branch_id',
        'classroom_id',
        'course_id',
        'teacher_id',
    ];

    protected $casts = [
        'days' => 'array',
    ];
}
