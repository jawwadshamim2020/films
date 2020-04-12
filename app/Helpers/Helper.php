<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }
	
	public static function debug($array=array())
    {
       echo "<pre>";print_r($array);echo "<pre>"; exit;
    }

    //Get Film Slug
    static public function getFilmSlug($name)
	{
		$slug = preg_replace('#[^0-9a-z]+#i', '-', $name);
		$lastCharName = substr($name, -1);
		$lastSlugChar = substr($slug, -1);
		if ($lastSlugChar == "-" && $lastCharName != "-"){
			$slug = substr($slug, 0, strlen($slug) - 1);
		}

		$slug = strtolower($slug);
		
		return $slug;
		
	}

	//get country by code
	static public function getCountryName($code=''){
		$countries = config('constants.countries');
		$countryName = array_get($countries,$code , NULL);	
		return $countryName;
	}

	//get comma seprated genre by code 
	static public function getGenre($genreCodeCommaSeprated=''){
		$genreCommaSeprated = '';

		$allGenre = config('constants.genre');
		$genreArray = array();
		
		$exploded = explode(',',$genreCodeCommaSeprated);
		if(!empty($exploded)){
			foreach($exploded as $code){
				$genreArray[] = array_get($allGenre,$code , NULL);	
			}

			if(!empty($genreArray)){
				$genreCommaSeprated = implode(',',$genreArray);
			}
		}
		
		
		return $genreCommaSeprated;
	}

	

	//get http data
	static function httpGet($url)
	{
		
		$ch = curl_init();  
	
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$output=curl_exec($ch);
	
		curl_close($ch);
		if(!empty($output)){
			return json_decode($output, TRUE);
		}else{
			return [];
		}
		
	}

	
}

