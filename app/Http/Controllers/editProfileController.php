<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;

class editProfileController extends Controller
{
    protected function updatePrimaryInfo(Request $request)
    {

        $trainer = Trainer::find($request['id']);
        $trainer->name = $request['name'];
        $trainer->surname = $request['surname'];
        $trainer->gender = $request['gender'];
        $trainer->phone = $request['phone'];
        $trainer->facebook = $request['facebook'];
        $trainer->instagram = $request['instagram'];
        $trainer->save();

        return $request;
    } 

    protected function updateEmailInfo(Request $request)
    {
        $trainer = Trainer::find($request['id']);
        $trainer->email = $request['new_email'];
        $trainer->save();
        
        return $request;
    } 

}
