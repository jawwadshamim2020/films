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
        DB::table('users')->insert([
                                    
                                    [   'name'=>'Darren',
                                        'email'=>'Darren@test.com',
                                        'password'=> Hash::make('123456'),
                                        'created_at'=>date('Y-m-d H:i:s'),
                                        'updated_at'=>date('Y-m-d H:i:s')
                                    ],
                                    [   'name'=>'Jorge',
                                        'email'=>'Jorge@test.com',
                                        'password'=> Hash::make('123456'),
                                        'created_at'=>date('Y-m-d H:i:s'),
                                        'updated_at'=>date('Y-m-d H:i:s')
                                    ],
                                    [   'name'=>'Raphael',
                                        'email'=>'Raphael@test.com',
                                        'password'=> Hash::make('123456'),
                                        'created_at'=>date('Y-m-d H:i:s'),
                                        'updated_at'=>date('Y-m-d H:i:s')
                                    ]

        ]);


       
    }
}
