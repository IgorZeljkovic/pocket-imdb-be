<?php

namespace App\Http\Controllers\Api;

use App\Vote;
use App\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieVoteController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Movie $movie, $type)
    {
        return Vote::create([
            'type' => $type,
            'user_id' => auth()->id(),
            'votable_id' => $movie->id,
            'votable_type' => Movie::class            
        ])->votable;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vote  $vote
     * @return \Illuminate\Http\Response
     */
    public function update(Movie $movie, $type)
    {
        $movie->votes()
            ->where('user_id', auth()->id())
            ->update(['type' => $type]);

        return $movie;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $movie->votes()
            ->where('user_id', auth()->id())
            ->delete();

        return $movie;
    }
}
