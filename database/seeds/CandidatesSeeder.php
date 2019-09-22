<?php

use Illuminate\Database\Seeder;

class CandidatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'eng_ID' => "50023",
            'name' => 'Audu Emmanuel',
            'email' => 'kole.audu1@gmail.com',
            'verified' => 1,
            'role' => 0,
            'password' => app('hash')->make('adaaudu'),
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 1,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 1
        ]);

        DB::table('users')->insert([
            'eng_ID' => "54112",
            'name' => 'John Audu',
            'role' => 0,
            'verified' => 1,
            'email' => 'kole.audu2@gmail.com',
            'password' => app('hash')->make('adaaudu'),
            // 'created_at' => '',
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 1,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'Audu Onyeche',
            'eng_ID' => "54127",
            'email' => 'kole.audu3@gmail.com',
            'password' => '',
            // 'created_at' => '',
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 1,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 3
        ]);

        DB::table('users')->insert([
            'eng_ID' => "54121",
            'name' => 'Audu Ngbede',
            'email' => 'kole.audu4@gmail.com',
            'password' => '',
            // 'created_at' => '',
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 2,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 4
        ]);

        DB::table('users')->insert([
            'eng_ID' => "54123",
            'name' => 'Audu Sony',
            'email' => 'kole.audu5@gmail.com',
            'password' => '',
            // 'created_at' => '',
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 2,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 5
        ]);

        DB::table('users')->insert([
            'eng_ID' => "34323",
            'name' => 'Audu Onyeche',
            'email' => 'kole.audu6@gmail.com',
            'password' => app('hash')->make('adaaudu'),
        ]);
        DB::table('candidates')->insert([
            'candidate_position_id' => 2,
            'candidate_image' => 'default.jpeg',
            'candidate_user_id' => 6
        ]);
    }
}
