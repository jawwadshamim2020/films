<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Film;

class FilmTest extends TestCase
{
    /**
     * Tests Films without params to see if it works
     *
     * @return void
     */
    public function testGetFilms()
    {
        $url = config('constants.api-base-url')."/api/films";
        $response = $this->json('GET', $url);
        $response
            ->assertStatus(200) //check status
            ->assertJsonStructure([ //check Json Structure
                '*' => [ 'id', 'name', 'slug', 'description', 'release_date', 'rating', 'ticket_price', 'country', 'genre', 'film_image', 'created_at', 'updated_at' ],
            ]);
    }


     /**
     * Tests Films without params to see if it works
     *
     * @return void
     */
     public function testGetFilmDetail(){
        $randomId = rand(1,3);
        $filmDetail=Film::where('id', '=', $randomId)->first()->toArray();
        $url = config('constants.api-base-url')."/api/film/".$filmDetail['slug'];
        $response = $this->json('GET', $url);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ //check Json Structure
                '*' => [ 'id', 'name', 'slug', 'description', 'release_date', 'rating', 'ticket_price', 'country', 'genre', 'film_image', 'created_at', 'updated_at',
                'film_comment_user' =>[
                                        ['id','user_id','film_id','comments','created_at','updated_at','user'=>['id','name','email','email_verified_at','created_at','updated_at']]
                                      ]
                                ],
            ]);

     }

}
