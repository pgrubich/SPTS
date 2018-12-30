<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrPhotos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

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
            $album->only_for_avatar = 'NO';
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
        $trainer = Trainer::find(auth()->user()->id);

        if ($trainer->avatar = $photo) {
            $trainer->avatar = NULL;
            $trainer->save();
        }

        if ($photo->trainer_id = $trainer->id){
            Storage::delete('public/trainers_photos/'.$trainer->id.'/'.$photo->photo_name);
            //Session::flash('success', 'Usunięto zdjęcie.');
            $photo->delete();
        } //else {
            //Session::flash('info', 'Usunięcie zdjęcia nie powiodło się.');
        //}

        return redirect('/editProfile');
    }


    protected function addProfilePicture(Request $request)
    {
        $this->validate($request, [
            'photo_name' => 'image|max:5000'
        ]);

        if($request->hasFile('photo_name')) {

            $coordX = $request->input('coordX');
            $coordY = $request->input('coordY');
            $coordW = $request->input('coordW');
            $coordH = $request->input('coordH');
            //$scaledWidth = $request->input('widthPic');
            $scaledHeight = $request->input('heightPic');

            $originalFilename = $request->file('photo_name')->getClientOriginalName();
            $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
            $extension = $request->file('photo_name')->getClientOriginalExtension();
            $finalFilename = $fileName.'_'.time().'.'.$extension;
            //$path = $request->file('photo_name')->storeAs('public/trainers_photos/'.auth()->user()->id, $finalFilename);

            $image = Image::make($request->file('photo_name')->getRealPath());
            //$realWidth = $image->width();
            $realHeight = $image->height();
            $ratio = $realHeight / $scaledHeight;

            $path = public_path('/storage/trainers_photos/').auth()->user()->id;
            if(!File::exists($path)) {
                File::makeDirectory($path);
            }
            $image->crop(round($coordW * $ratio),round($coordH * $ratio),round($coordX * $ratio),round($coordY * $ratio))->save($path.'/'.$finalFilename);

            $album = new TrPhotos;
            $album->trainer_id = auth()->user()->id;
            $album->photo_name = $finalFilename;
            $album->only_for_avatar = 'NO';
            $album->timestamps = false;
            $album->save();

            $new_photo_id = $album->id;

            $trainer = Trainer::find(auth()->user()->id);
            $trainer->avatar = $new_photo_id;
            $trainer->save();

            $request->session()->flash('success', 'Dodano zdjęcie profilowe.');

        } else {
            $request->session()->flash('info', 'Nie udało się dodać zdjęcia profilowego.');
        }

        return redirect('/editProfile');
    }


    protected function updateProfilePicture($id)
    {
        if (TrPhotos::where('id', '=', $id)->exists()) {
            $photoId = TrPhotos::find($id);
            $trainer = Trainer::find(Auth::user()->id);
            $trainer->profile_picture_id = $photoId;
            $trainer->save();
        }
        else {
            return('Nie znaleziono wybranego zdjęcia.');
        }

        return redirect('/editProfile');
    }

    protected function destroyProfilePicture(Request $request)
    {
        $photo = TrPhotos::find(auth()->user()->avatar);

        if ($photo->only_for_avatar == 'YES')
        {
            $this->destroy(auth()->user()->avatar);
        }
        else
        {
            $trainer = Trainer::find(auth()->user()->id);
            $trainer->avatar = NULL;
            $trainer->save();
        }    
        
        return redirect('/editProfile');
    }


}
