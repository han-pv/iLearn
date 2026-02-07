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

    public static function makeGroupCode($courseId, $courseName, $seasonId)
    {
        $group = Group::where("season_id", $seasonId)
            ->where("course_id", $courseId)
            ->latest()
            ->first();

        if (!$group) {
            return $courseName[0] . "-A"; // E-A
        }

        $lastGroupCode = explode("-", $group->code); // E-B   => ["E", "B"]

        $lastLetter = last($lastGroupCode); // "B"

        $lastLetter++; //C

        return $courseName[0] . "-" . $lastLetter; // E-C
    }
}
