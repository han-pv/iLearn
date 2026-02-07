<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function makeGroupCode($courseId, $courseName, $seasonId)
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
