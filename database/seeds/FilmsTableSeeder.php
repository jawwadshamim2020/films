<?php

use Illuminate\Database\Seeder;
use App\Helpers\Helper;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
                                    
            [   'name'=>'Speed Racer (2008)',
                'slug'=>Helper::getFilmSlug('Speed Racer (2008)'),
                'description'=>'Speed Racer is the tale of a young and brilliant racing driver. When corruption in the racing leagues costs his brother his life, he must team up with the police and the mysterious Racer X to bring an end to the corruption and criminal activities. Inspired by the cartoon series.',
                'release_date'=> date("Y-m-d", strtotime('05/09/2008')),
                'rating'=>'4',
                'ticket_price'=>'100',
                'country'=>'US',
                'genre'=>'comedy,crime,drama',
                'film_image'=>'nbQoJeoEwKQiQMdRiRBoJ1Goere.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
                
            ],
            [  
                'name'=>'Home Alone 2: Lost in New York (1992)',
                'slug'=>Helper::getFilmSlug('Home Alone 2: Lost in New York (1992)'),
                'description'=>'Home Alone 2: Lost in New York is currently available to stream, rent, and buy in the United States. JustWatch makes it easy to find out where you can legally watch your favorite movies & TV shows online. Visit JustWatch for more information.',
                'release_date'=> date("Y-m-d", strtotime('11/19/1992 ')),
                'rating'=>'5',
                'ticket_price'=>'300',
                'country'=>'PK',
                'genre'=>'comedy,drama,fantasy',
                'film_image'=>'uuitWHpJwxD1wruFl2nZHIb4UGN.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ],
            [   
                'name'=>'Jumanji: The Next Level (2019)',
                'slug'=>Helper::getFilmSlug('Jumanji: The Next Level (2019)'),
                'description'=>'As the gang return to Jumanji to rescue one of their own, they discover that nothing is as they expect. The players will have to brave parts unknown and unexplored in order to escape the world’s most dangerous game.',
                'release_date'=> date("Y-m-d", strtotime('12/13/2019')),
                'rating'=>'3',
                'ticket_price'=>'200',
                'country'=>'OM',
                'genre'=>'comedy,adventure,historical,war',
                'film_image'=>'bB42KDdfWkOvmzmYkmK58ZlCa9P.jpg',
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]

]);
    }
}
