<?php

namespace App\Http\Controllers;

use App\Watchlist;
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
        Auth::user()->watchlists()->create(Input::all());

        return redirect('/profile');
    }

    public function storeItem(Request $request)
    {
        $request->session()->flash('message', 'Added!');
        $watchlist_id = $request['watchlist_id'];
        Auth::user()->watchlists()->findOrFail($watchlist_id)->items()->create(Input::all());

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
        
        return view('pages.watchlist')->with("watchlist", $watchlist);
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
        $watchlist = Auth::user()->watchlists()->findOrFail($id);
        $watchlist->items()->delete();
        $watchlist->delete();

        return redirect('/profile');
    }
}