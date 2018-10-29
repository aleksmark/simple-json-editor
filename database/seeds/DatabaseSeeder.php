<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->truncate();

        for($i = 1; $i < 6; $i++) {
            DB::table('games')->insert([
                'id' => $i,
                'settings' => json_encode([
                    'name' => 'game ' . $i,
                    'win_rate' => 100 * $i,
                    'credits' => 'credits ' . $i,

                ]),
            ]);
        }
    }
}
