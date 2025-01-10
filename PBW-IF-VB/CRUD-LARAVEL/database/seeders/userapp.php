<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userapp extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData= [
        [
            'name'=>'sarah',
            'email'=>'sarah@gmail.com',
            'role'=>'admin',
            'password'=>bcrypt('123456')
        ],
      
    ];

    foreach($userData as $key=> $val){
        User::create($val);
}
}
}