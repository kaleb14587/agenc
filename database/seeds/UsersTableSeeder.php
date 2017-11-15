<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       App\User::create([
           'name'=>'kaleb borda fonseca',
           'email'=>'kaleb_bf@hotmail.com',
           'password'=>bcrypt('123456')
       ]);
    }
}
