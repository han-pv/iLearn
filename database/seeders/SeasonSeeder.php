<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasons = [
            ["name" => "Winter-2026", "code" => "1", "start_date" => "2025-12-15", "end_date" => "2026-03-02"],
            ["name" => "Spring-2026", "code" => "2", "start_date" => "2026-03-10", "end_date" => "2026-05-23"],
        ];

        foreach ($seasons as $season) {
            Season::create([
                "name" => $season["name"],
                "code" => $season["code"],
                "start_date" => $season["start_date"],
                "end_date" => $season["end_date"],
            ]);
        }
    }
}

