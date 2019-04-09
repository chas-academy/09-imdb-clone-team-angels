<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Watchlist;
use App\Review;
use App\User;

class PagesController extends Controller
{
    private $api = null;
    public function __construct(){
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

    public function index(){
        //Popular
        $popularResponse = $this->apiCall("/movie/popular");

        //trending this week but same year
        $trendingResponse = $this->apiCall("/trending/movie/week");
        $cleanTrending = [];
        foreach ($trendingResponse['results'] as $value){
            if (substr($value['release_date'], 0 ,-6) == date("Y")) { 
                array_push($cleanTrending, $value);
            }
        }

        if (isset($error_msg)) {
            return view('pages.index')->with('error_msg', $error_msg);
        } else {
            return view('pages.index')->with('popular', $popularResponse['results'])->with('trending', $cleanTrending);
        }
    }


    public function searchResults(Request $request){
        if(isset($request->movieName) && !empty($request->movieName)) {
            $searchedMovieName = $request->movieName;
            $resultsResponse = $this->apiCall("/search/movie", "&query={$searchedMovieName}");
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResults')->with('error_msg', $error_msg);
        } else {
            return view('pages.searchResults')->with('data', $resultsResponse['results'])->with('searchTerm', $request->movieName);
        }
    }


    public function searchResultsGenre(Request $request){
        if(isset($request->movieGenre) && !empty($request->movieGenre)) {
            $searchedMovieGenre = $request->movieGenre;
            $resultsResponse = $this->apiCall("/discover/movie", "&with_genres={$searchedMovieGenre}");
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResultsGenre')->with('error_msg', $error_msg);
        } else {
            return view('pages.searchResultsGenre')->with('data', $resultsResponse['results'])->with('searchGenre', $request->movieGenre);
        }
    }


    public function movieDetail($id){
        if(isset($id) && !empty($id)) {
            $detailResponse = $this->apiCall("/movie/{$id}recommendations", "&append_to_response=videos,credits,similar");
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.movieDetail')->with('error_msg', $error_msg);
        }

        if (Auth::user()) {
            $watchlists = Auth::user()->watchlists()->get();
        }
        
        $reviews = Review::where('tmdb_id', $id)->get();
        
        if(isset($watchlists)){
            return view('pages.movieDetail')->with('watchlists', $watchlists)->with('data', $detailResponse)->with('reviews', $reviews);
        } else{
            return view('pages.movieDetail')->with('data', $detailResponse)->with('reviews', $reviews);
        }

    }


    public function actorDetail($id){
        if(isset($id) && !empty($id)) {
            $actorResponse = $this->apiCall("/person/{$id}", "&append_to_response=tagged_images,movie_credits");
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.actorDetail')->with('error_msg', $error_msg);
        } else {
            return view('pages.actorDetail')->with('data', $actorResponse);
        }
    }


    public function profile(){
        $watchlists = Auth::user()->watchlists()->get();
        $reviews = Auth::user()->reviews()->get();

        return view('pages.profile')->with("watchlists", $watchlists)->with("reviews", $reviews);
    }


    public function watchlist(){
        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.watchlistDetail')->with("watchlists", $watchlists);
    }


    public function pendingReviews(){
        $reviews = Review::where('approved', 0)->get();

        return view('pages.pendingReviews')->with("reviews", $reviews);
    }


}
