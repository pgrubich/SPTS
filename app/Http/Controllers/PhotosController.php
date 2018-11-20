<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrPhotos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $this->validate($request, [
            'photo_name' => 'image|max:5000'
        ]);

        if($request->hasFile('photo_name')) {

            $originalFilename = $request->file('photo_name')->getClientOriginalName();
            $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
            $extension = $request->file('photo_name')->getClientOriginalExtension();
            $finalFilename = $fileName.'_'.time().'.'.$extension;
            $path = $request->file('photo_name')->storeAs('public/trainers_photos/'.auth()->user()->id, $finalFilename);

            $album = new TrPhotos;
            $album->trainer_id = auth()->user()->id;
            $album->photo_name = $finalFilename;
            $album->timestamps = false;
            $album->save();

            $request->session()->flash('success', 'Dodano zdjęcie.');

        } else {
            $request->session()->flash('info', 'Nie udało się dodać zdjęcia.');
        }

        return redirect('/editProfile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = TrPhotos::find($id);
        if ($photo->trainer_id = auth()->user()->id){
            Storage::delete('public/trainers_photos/'.auth()->user()->id.'/'.$photo->photo_name);
            //Session::flash('success', 'Usunięto zdjęcie.');
            $photo->delete();
        } //else {
            //Session::flash('info', 'Usunięcie zdjęcia nie powiodło się.');
        //}

        return redirect('/editProfile');
    }


}
