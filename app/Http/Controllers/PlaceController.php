<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceRequest;
use App\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Place::all();
        return view('pages.places', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Place::all();

        return view('pages.places', compact('datas'));
    }

    public function createpost(PlaceRequest $request)
    {
        $query = Place::create(
            [
                'name' => $request->name,
                'type' => $request->tips,
            ]
        );
        return redirect('/places');
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $query = Place::find($id);
        return view('pages.place', compact('query'));
    }
    public  function  addphoto(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $places
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $places
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $places)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $places
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $places)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $places
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $places)
    {
        //
    }
}
