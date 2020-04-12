<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
                                    
            [   'user_id'=>1,
                'film_id'=>3,
                'comments'=> "The film is punchy, landing some great jokes that will make you laugh out loud, with an entertaining, slightly predictable story. It wasn’t as good as the first 'Jumanji', but it is a great quality sequel and is full of family fun!",
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],
            [   'user_id'=>2,
                'film_id'=>1,
                'comments'=> "First, let me start with a disclaimer: I grew up with 'Speed Racer', and while I don't remember much about the show I do remember loving it and the sound of 'Go, Speed Racer, Go' evoked that feeling.",
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ],
            [   'user_id'=>3,
                'film_id'=>2,
                'comments'=> "Home Alone 2 has pretty much the same plot as the first movie, but Home Alone 2 is a very good sequel. The new traps for the Wet, er... Sticky Bandits are great. Once again Joe Pesci and Daniel Stern give wonderful performances. Having Tim Curry in this was also a treat. There is a lot of enjoyment in this movie.",
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')

            ]

        ]);
    }
}
