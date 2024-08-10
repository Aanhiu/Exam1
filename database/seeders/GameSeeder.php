<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 10 ; $i++) {

            $item = new Game();

            $item->title = "Trò chơi $i";

            $item->cover_art = '...';

            $item->developer = "Bảo Developer";
            $item->release_year = "2004";
            $item->genre = "Sinh tồn";

            $item->save();

        }


    }
}
