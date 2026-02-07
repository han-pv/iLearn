<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shifts = [
            ["name" => "Morning", "start_time" => "09:00", "end_time" => "11:50"],
            ["name" => "Afternoon", "start_time" => "14:50", "end_time" => "17:45"],
            ["name" => "Evening", "start_time" => "18:25", "end_time" => "21:20"],
        ];

        foreach ($shifts as $shift) {
            Shift::create([
                "name" => $shift["name"],
                "start_time" => $shift["start_time"],
                "end_time" => $shift["end_time"],
            ]);
        }
    }
}
