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
            ["name" => "Morning", "name_tm" => "Irden", "name_ru" => "Утро", "start_time" => "09:00", "end_time" => "11:50"],
            ["name" => "Afternoon", "name_tm" => "Öýlän", "name_ru" => "После обеда", "start_time" => "14:50", "end_time" => "17:45"],
            ["name" => "Evening", "name_tm" => "Agşam", "name_ru" => "Вечер", "start_time" => "18:25", "end_time" => "21:20"],
        ];

        foreach ($shifts as $shift) {
            Shift::create([
                "name" => $shift["name"],
                "name_tm" => $shift["name_tm"],
                "name_ru" => $shift["name_ru"],
                "start_time" => $shift["start_time"],
                "end_time" => $shift["end_time"],
            ]);
        }

        // for ($i = 1; $i <= 3; $i++) {
        //     Shift::where("id", $i)->update([
        //         "name" => $i == 1 ? "Morning" : ($i == 2 ? "Afternoon" : "Evening"),
        //         "name_tm" => $i == 1 ? "Irden" : ($i == 2 ? "Öýlän" : "Agşam"),
        //         "name_ru" => $i == 1 ? "Утро" : ($i == 2 ? "После обеда" : "Вечер"),
        //         "start_time" => $i == 1 ? "09:00" : ($i == 2 ? "14:50" : "18:25"),
        //         "end_time" => $i == 1 ? "11:50" : ($i == 2 ? "17:45" : "21:20"),
        //     ]);
        // }
    }
}
