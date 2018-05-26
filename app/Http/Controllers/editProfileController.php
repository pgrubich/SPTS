<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;

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

    protected function updateEmailInfo(Request $request)
    {
        $trainer = Trainer::find($request['id']);
        $trainer->email = $request['new_email'];
        $trainer->save();

        return redirect('/editProfile');
    } 

}
