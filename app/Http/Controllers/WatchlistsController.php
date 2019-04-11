<?php

namespace App\Http\Controllers;

use App\Watchlist;
use App\WatchlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class WatchlistsController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $watchlist = Watchlist::where('title', '=', Input::get('title'))->first();
        if ($watchlist === null) {
            Auth::user()->watchlists()->create(Input::all());
        } else{
            $request->session()->flash('message', 'Watchlist already exist!');
        }

        return redirect('/profile');
    }

    public function storeItem(Request $request)
    {
        
        $watchlist_id = $request['watchlist_id'];
        $watchlist_item = WatchlistItem::where('title', '=', Input::get('title'))->first();

        $watchlist_item_movieids = Auth::user()->watchlists()->findOrFail($watchlist_id)->items()->get()->pluck('movie_id')->all();

        if (in_array($request['movie_id'], $watchlist_item_movieids)) {
            $request->session()->flash('message', 'Already added!');
        } else {
            Auth::user()
            ->watchlists()
            ->findOrFail($watchlist_id)
            ->items()
            ->create(Input::all());
            $request->session()->flash('message', 'Added!');
        }

        $redirectTo = $request['redirect_to'];
        if (isset($redirectTo)) {
            return redirect($redirectTo);
        } else {
            return redirect('/profile');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $watchlist = Auth::user()->watchlists()->findOrFail($id);
        
        return view('pages.watchlistDetail')->with("watchlist", $watchlist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchList $watchList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $watchlist_id = $request['id'];
        $watchlist = Auth::user()->watchlists()->findOrFail($watchlist_id);
        $watchlist->fill(Input::all());
        $watchlist->save();

        return redirect('/watchlists/' . $watchlist_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {

        $watchlist = Watchlist::where('id', $id);
        $watchlist = Auth::user()->watchlists()->findOrFail($id);

        $watchlist->items()->delete();
        $watchlist->delete();

        return redirect('/profile');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WatchList  $watchList
     * @return \Illuminate\Http\Response
     */
    public function destroyItem(int $id, int $watchlist_item_id)
    {   
        $watchlist = Auth::user()->watchlists()->findOrFail($id);
        $watchlist_item = $watchlist->items()->findOrFail($watchlist_item_id)->delete();

        return redirect('/watchlists/' . $watchlist['id']);
    }
}
