<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Watchlist;

class PagesController extends Controller
{

    // Needs you to be logged in

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('pages.index');
    }

    public function searchResults(Request $request)
    {
        // dd($request->all());
        // dd($request->action);

        if(isset($request->movieName) && !empty($request->movieName)) {
            
            $api = env('TMDB_API_KEY');
            $searchedMovieName = $request->movieName;
            $url = "https://api.themoviedb.org/3/search/movie?api_key={$api}&language=en-US&query={$searchedMovieName}&page=1&include_adult=false";

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
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResults')->with('error_msg', $error_msg);
        } else {
            return view('pages.searchResults')->with('data', $decodedResponse['results']);
        }
    }

    public function movieDetail($id)
    {
        // dd($request->all());
        // dd($request->action);

        if(isset($id) && !empty($id)) {

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
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.movieDetail')->with('error_msg', $error_msg);
        }

        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.movieDetail')->with('watchlists', $watchlists)->with('data', $decodedResponse);
    }

    public function profile()
    {
        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.profile')->with("watchlists", $watchlists);
    }


    public function actorDetail($id)
    {
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
        } else {
            $error_msg = "No id";
        }
        if (isset($error_msg)) {
            return view('pages.actorDetail')->with('error_msg', $error_msg);
        } else {
            return view('pages.actorDetail')->with('data', $decodedResponse);
        }
    }

    public function watchlist()    
    {
        $watchlists = Auth::user()->watchlists()->get();

        return view('pages.watchlist')->with("watchlists", $watchlists);
    }


    public function searchResultsGenre(Request $request)
    {
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
        } else {
            $error_msg = "No data in input box";
        }
        if (isset($error_msg)) {
            return view('pages.searchResultsGenre')->with('error_msg', $error_msg);
        } else {
            return view('pages.searchResultsGenre')->with('data', $decodedResponse['results']);
        }
    }

}
