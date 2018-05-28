<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class editProfileController extends Controller
{
    protected function updatePrimaryInfo(Request $request)
    {

        $trainer = Trainer::find($request['id']);
        if ($request['name'] != '')        $trainer->name = $request['name'];
        if ($request['surname'] != '')     $trainer->surname = $request['surname'];
        if ($request['gender'] != '')      $trainer->gender = $request['gender'];
        if ($request['bdate'] != '')       $trainer->bdate = $request['bdate'];
        if ($request['phone'] != '')       $trainer->phone = $request['phone'];
        if ($request['facebook'] != '')    $trainer->facebook = $request['facebook'];
        if ($request['instagram'] != '')   $trainer->instagram = $request['instagram'];
        $trainer->save();

        return redirect('/editProfile');
    } 


    protected function updateSpecificInfo(Request $request)
    {
        $trainer = Trainer::find($request['id']);
        if ($request['description'] != '')        $trainer->description = $request['description'];
        $trainer->save();

        return redirect('/editProfile');
    }

    protected function updateEmailInfo(Request $request)
    {
        $trainer = Trainer::find($request['id']);
        $trainer->email = $request['new_email'];
        $trainer->save();

        return redirect('/editProfile');
    } 


    protected function editPasswordInfo(Request $request)
    {
        if (Hash::check($request['current_password'], Auth::user()->password))
        {
            $trainer = Trainer::find($request['id']);
            if ($request['new_password'] != '') $trainer->password = Hash::make($request['new_password']);
            $trainer->save();

            return redirect('/editProfile');
        }
        else
        {
            return ('Podano złe hasło.');
        }
    } 


}
