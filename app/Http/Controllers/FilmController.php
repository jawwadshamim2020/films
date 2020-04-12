<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createFilmRequest;
use App\Helpers\Helper;
use App\Film;
use DataTables;


/**
 * Class FilmController
 *
 * Resource controller for film which include
 * the create new film, list all flim and flim detail.
 *
 * @package App\Http\Controllers
 */

class FilmController extends Controller
{
    /**
    * 
    * List of all films
     * View for the films list 
     * @return mixed
     */

    public function index(){
        return view('film/index');
    }

    //films data with datatable
    public function filmsList(){
       
       $url = config('constants.api-base-url')."/api/films";
       $apiData = Helper::httpGet($url);  
      
       $filmData =  DataTables::of($apiData)
       ->editColumn('name', function ($item) {
        return '<a href="'.route('film-detail', $item['slug']) .'">'.$item['name'].'</a>';
        })
        ->editColumn('image', function ($item) {
            return '<img height="42" width="42" src="'.asset('/film_image').'/'.$item['film_image'].'">';
        })
        ->rawColumns(['name','image'])
        ->make(true);
       
       return $filmData;
    }

       //Film detail
       public function filmDetail($slug=''){

        $url = config('constants.api-base-url')."/api/film/".$slug;
        $data = Helper::httpGet($url); 
        return view('film/detail')->with($data);
    }
   
    //Create film form
    public function createFrom(){
        
        #Countries from constant file
        $data['countries'] = config('constants.countries');
        #Genre from constant file
        $data['genre'] = config('constants.genre');

        #render view
        return view('film/create')->with($data);
    }


     /**
     * Create new film
     *
     * @param  createFilmRequest  $request
     * @return Response
     */
    public function create(createFilmRequest $request){
        
        //trigger exception in a "try" block
        try{
            //Get all inputs
            $data = $request->post();
            
            //film image upload
            $filmImage = $this->filmImageUpload($request);

            // Save In Database
            $film= new Film();
            $film->name             = $data['name'];
            $film->slug             = Helper::getFilmSlug($data['name']);
            $film->description      = $data['description'];
            $film->release_date     = date("Y-m-d", strtotime($data['release_date']));
            $film->rating           = $data['rating'];
            $film->ticket_price     = $data['ticket_price'];
            $film->country          = $data['country'];
            $film->genre            = implode(',',$data['genre']);
            $film->film_image       = $filmImage;
            $film->save();

            return redirect(route('films'))->with('success', 'Film has been successfully added.');
        //catch exception
        }catch(\Exception $e){
            return redirect(route('films'))->with('error', $e->getMessage());
        }
      

    }

    /**
     * Film image upload
     *
     * @param  $request
     * @return filmImage
     */
    public function filmImageUpload($request){
        
        $filmImage ='';
        //Check film image is not empty
        if ($files = $request->file('film_image')) {
            // Define upload path
            $destinationPath = public_path('/film_image/'); // upload path
         
            // Upload Orginal Image           
            $filmImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            //move file from source to destination
            $files->move($destinationPath, $filmImage);
        } 
        
        return $filmImage;
    }
    
}
