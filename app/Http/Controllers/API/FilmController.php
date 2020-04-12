<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Film;

class FilmController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFilms(){

        try{
            
            //get all films
            $filmData = Film::all()->toArray();
            //return response
            return response()->json($filmData,200);

        }catch(\Exception $e){
            \Log::info("getFilms api message:: ".$e->getMessage());
            return response()->json($e->getMessage(),500);
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getFilmDetail($slug=''){
    
        try{
            //get all films
            $filmDetail=Film::with('filmCommentUser')->where('slug', '=', $slug)->first()->toArray();
            //return response
            return response()->json(compact('filmDetail'),200);

        }catch(\Exception $e){
            \Log::info("getFilmDetail api message:: ".$e->getMessage());
            return response()->json($e->getMessage(),500);
        }  
    }
    
    
}
