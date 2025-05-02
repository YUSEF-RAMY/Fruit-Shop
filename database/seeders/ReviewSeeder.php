<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            ['name' => 'Yusef Ramy' , 'email'=>'yuseframy14@gmail.com','imagepath'=>'assets/img/avaters/avatar2.png','phone'=>'01095132780', 'subject'=>'owner' , 'massage'=>'good webside'],
            ['name' => 'Mohamed Saber' , 'email'=>'mohamed54@gmail.com','imagepath'=>'assets/img/avaters/avatar3.png','phone'=>'01010101010', 'subject'=>'user' , 'massage'=>'good qualty fruit']
        ]);
    }
}
