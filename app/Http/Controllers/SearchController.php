<?php

namespace App\Http\Controllers;

use App\Search;
use Illuminate\Http\Request;
use DB;
use App\Models\ListByDiscipline\Trainer;

class SearchController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function show($search)
    {
        $replaced = str_replace('_', ' ', $search);

        return Trainer::whereHas('TrDisc',function($query) use($replaced)
        {
            $query->where('discipline_name', '=', $replaced);
        })->orWhereHas('trLoc',function($query) use($replaced)
        {
            $query->where('city', 'LIKE', '%'.$replaced.'%')
            ->orWhere('voivodeship', 'LIKE', '%'.$replaced.'%');
        })->orWhereHas('trPl',function($query) use($replaced)
        {
            $query->where('place', 'LIKE', '%'.$replaced.'%');
        })->with('TrDisc','trLoc','trPl')->get();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function edit(Search $search)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Search $search)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Search  $search
     * @return \Illuminate\Http\Response
     */
    public function destroy(Search $search)
    {
        //
    }
}
