<?php

use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('position')->insert([
            'position_name' => 'Presidential',
            'election_id' => 1
        ]);

        DB::table('position')->insert([
            'position_name' => 'Vice presidential',
            'election_id' => 1
        ]);
    }
}
