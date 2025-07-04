<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        ['name' => 'sudo' , 'email'=>'yuseframy14@gmail.com','password'=>'$2y$12$k6H1uSs6HoEzgdKSmtUhU.yOH0Fd2giEgnUJhRFi8LLBwL54tCn8q'],
        ]);
    }
}
