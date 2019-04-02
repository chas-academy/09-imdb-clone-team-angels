<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Watchlist;

class PagesController extends Controller
{
    private $api = null;
    public function __construct()
    {
        $this->api = env("TMDB_API_KEY");
    }

    public function apiCall($path, $params = "") {
        $url = "https://api.themoviedb.org/3".$path."?api_key=".$this->api.$params."&language=en-US&page=1&include_adult=false";
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);

        // if (curl_error($ch)) {
        //     $error_msg = curl_error($ch);
        // }

        curl_close($ch);

        if (!isset($error_msg)){
            return json_decode($response, true);
        }
    
    }

    public function index()
    {
<<<<<<< HEAD
        //Popular
        $popularResponse = $this->apiCall("/movie/popular");

        //trending this week but same year
        $trendingResponse = $this->apiCall("/trending/movie/week");
=======
        
        //popular
        $api = env('TMDB_API_KEY');
        $url = "https://api.themoviedb.org/3/movie/popular?api_key={$api}&language=en-US&page=1";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);

        if (!isset($error_msg)){
            $popularResponse = json_decode($response, true);
        }


        //trending this week but same year
        $api = env('TMDB_API_KEY');
        $url = "https://api.themoviedb.org/3/trending/movie/week?api_key={$api}";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);

        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
        }

        curl_close($ch);

        if (!isset($error_msg)){
            $trendingResponse = json_decode($response, true);
        }

>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        $cleanTrending = [];
        foreach ($trendingResponse['results'] as $value){
            if (substr($value['release_date'], 0 ,-6) == date("Y")) { 
                array_push($cleanTrending, $value);
            }
        }
<<<<<<< HEAD
=======
        
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade

        if (isset($error_msg)) {
            return view('pages.index')->with('error_msg', $error_msg);
        } else {
            return view('pages.index')->with('popular', $popularResponse['results'])->with('trending', $cleanTrending);
        }

<<<<<<< HEAD
=======
        // return view('pages.index');
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
    }

    public function searchResults(Request $request)
    {
        if(isset($request->movieName) && !empty($request->movieName)) {
            $searchedMovieName = $request->movieName;
            $resultsResponse = $this->apiCall("/search/movie", "&query={$searchedMovieName}");
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResults')->with('error_msg', $error_msg);
        } else {
<<<<<<< HEAD
            return view('pages.searchResults')->with('data', $resultsResponse['results'])->with('searchTerm', $request->movieName);
=======
            return view('pages.searchResults')->with('data', $decodedResponse['results'])->with('searchTerm', $request->movieName);
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        }
    }

    public function movieDetail($id)
    {
        if(isset($id) && !empty($id)) {
<<<<<<< HEAD
            $detailResponse = $this->apiCall("/movie/{$id}recommendations", "&append_to_response=videos,credits,similar");
=======

            $api = env('TMDB_API_KEY');
            $url = "https://api.themoviedb.org/3/movie/{$id}recommendations?api_key={$api}&append_to_response=videos,credits,similar";
           
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);

            $response = curl_exec($ch);

            if (curl_error($ch)) {
                $error_msg = curl_error($ch);
            }

            curl_close($ch);

            if (!isset($error_msg)){
                $decodedResponse = json_decode($response, true);
            }
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.movieDetail')->with('error_msg', $error_msg);
        }

        if (Auth::user()) {
            $watchlists = Auth::user()->watchlists()->get();
        }

        if(isset($watchlists)){
            return view('pages.movieDetail')->with('watchlists', $watchlists)->with('data', $detailResponse);
        } else{
            return view('pages.movieDetail')->with('data', $detailResponse);
        }
    }

    public function profile()
    {
        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.profile')->with("watchlists", $watchlists);
    }


    public function actorDetail($id)
    {
<<<<<<< HEAD
        if(isset($id) && !empty($id)) {
            $actorResponse = $this->apiCall("/person/{$id}", "&append_to_response=tagged_images,movie_credits");
=======
        // dd($request->all());
        // dd($request->action);

        if(isset($id) && !empty($id)) {

            $api = env('TMDB_API_KEY');
            $url = "https://api.themoviedb.org/3/person/{$id}?api_key={$api}&language=en-US&append_to_response=tagged_images,movie_credits";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);

            $response = curl_exec($ch);

            if (curl_error($ch)) {
                $error_msg = curl_error($ch);
            }

            curl_close($ch);

            if (!isset($error_msg)){
                $decodedResponse = json_decode($response, true);
            }
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.actorDetail')->with('error_msg', $error_msg);
        } else {
<<<<<<< HEAD
            return view('pages.actorDetail')->with('data', $actorResponse);
=======
            return view('pages.actorDetail')->with('data', $decodedResponse);
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        }
    }

    public function watchlist()    
    {
        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.watchlist')->with("watchlists", $watchlists);
    }


    public function searchResultsGenre(Request $request)
    {
<<<<<<< HEAD
        if(isset($request->movieGenre) && !empty($request->movieGenre)) {
            $searchedMovieGenre = $request->movieGenre;
            $resultsResponse = $this->apiCall("/discover/movie", "&with_genres={$searchedMovieGenre}");
=======
        // dd($request->all());
        // dd($request->action);

        if(isset($request->movieGenre) && !empty($request->movieGenre)) {
            
            $api = env('TMDB_API_KEY');
            $searchedMovieName2 = $request->movieGenre;
            $url = "https://api.themoviedb.org/3/discover/movie?api_key={$api}&with_genres={$searchedMovieName2}";

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FAILONERROR, true);

            $response = curl_exec($ch);

            if (curl_error($ch)) {
                $error_msg = curl_error($ch);
            }

            curl_close($ch);

            if (!isset($error_msg)){
                $decodedResponse = json_decode($response, true);
            }
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResultsGenre')->with('error_msg', $error_msg);
        } else {
<<<<<<< HEAD
            return view('pages.searchResultsGenre')->with('data', $resultsResponse['results'])->with('searchGenre', $request->movieGenre);
=======
            return view('pages.searchResultsGenre')->with('data', $decodedResponse['results'])->with('searchGenre', $request->movieGenre);
>>>>>>> a7462c1bec39cafdc5129533943d91223fabaade
        }
    }

}
