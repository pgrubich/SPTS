<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrLocation;
use App\Models\Trainer\TrCertificate;
use App\Models\Trainer\TrUniversity;
use App\Models\Trainer\Troffer;
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

    protected function addCity(Request $request)
    {
        if (TrLocation::where('city', '=', $request['city'])->where('voivodeship', '=', $request['voivodeship'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Podane miasto i województwo już się znajduję w profilu.');
        }
        else
        {
            TrLocation::create([
                'city' => $request['city'],
                'voivodeship' => $request['voivodeship'],
                'trainer_id' => $request['id'],
            ]);

            return redirect('/editProfile');
        }
    }


    protected function updateSpecificInfo(Request $request)
    {
        $trainer = Trainer::find($request['id']);
        if ($request['description'] != '')        $trainer->description = $request['description'];
        $trainer->save();

        return redirect('/editProfile');
    }

    protected function addCourse(Request $request)
    {

        if (TrCertificate::where('name_of_institution', '=', $request['place'])->where('name_of_course', '=', $request['name'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Certyfikat zawierjący podaną placówkę oraz nazwę kursu juz istnieje.');
        }
        else
        {
            TrCertificate::create([
                'name_of_institution' => $request['place'],
                'name_of_course' => $request['name'],
                'begin_date' => $request['begin_date'],
                'end_date' => $request['end_date'],
                'trainer_id' => $request['id'],
            ]);

            return redirect('/editProfile');
        }
    }


    protected function addUni(Request $request)
    {

        if (TrUniversity::where('university', '=', $request['name'])->where('course', '=', $request['course'])->where('degree', '=', $request['degree'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Twoja ista uczelni zawiera podaną placówkę, kierunek oraz stopień.');
        }
        else
        {
            TrUniversity::create([
                'university' => $request['name'],
                'course' => $request['course'],
                'degree' => $request['degree'],
                'begin_date' => $request['begin_date'],
                'end_date' => $request['end_date'],
                'trainer_id' => $request['id'],
            ]);

            return redirect('/editProfile');
        }
    }


    protected function addTrainerOffer(Request $request)
    {

        if (TrOffer::where('name', '=', $request['classes_name'])->where('max_no_of_clients', '=', $request['numbers_of_members'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Ten typ zajęc juz istnieje.');
        }
        else
        {
            TrOffer::create([
                'name' => $request['classes_name'],
                'price' => $request['price'],
                'max_no_of_clients' => $request['numbers_of_members'],
                'trainer_id' => $request['id'],
            ]);

            return redirect('/editProfile');
        }
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
