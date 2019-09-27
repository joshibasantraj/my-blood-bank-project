<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array =array(
            array(
                'name'=> 'Admin',
                'email'=> "admin@blood.com",
                'password'=> Hash::make('admin123'),
                'mobile'=>'9810680482',
                'role'=>'admin',
                'status'=>'active'
            ),
            array(
                'name'=> 'Donor',
                'email'=> "donor@blood.com",
                'password'=> Hash::make('donor123'),
                'mobile'=>'9810680482',
                'role'=>'donor',
                'status'=>'active'
            ),
            array(
                'name'=> 'Another Admin',
                'email'=> "anotheradmin@blood.com",
                'password'=> Hash::make('anotheradmin123'),
                'role'=>'admin',
                'mobile'=>'9810680482',
                'status'=>'inactive'
            ),
            array(
                'name'=> 'Another Donor',
                'email'=> "anotherdonor@blood.com",
                'password'=> Hash::make('anotherdonor123'),
                'role'=>'donor',
                'mobile'=>'9810680482',
                'status'=>'inactive'
            )
        );
        DB::table('users')->insert($array);

    }
}
