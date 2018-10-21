<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrTraining;
use App\Models\Trainer\TrOrderedTrainings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class CalendarController extends Controller
{

    protected function addTraining(Request $request)
    {
        if (TrTraining::where('trainer_id',$request['id'])->where('date', $request['date'])->where('begin_time',$request['begin_time'])->exists())
        {
            return ("Trening na tą godzinę juz istnieje");
        }
        else
        {
            TrTraining::create([
                'date' => $request['date'],
                'begin_time' => $request['begin_time'],
                'end_time' => $request['end_time'],
                'status' => "wolne",
                'plane' => $request['place'],
                'trainer_id' => $request['id'],
            ]);
        }
    }


    protected function deleteTraining(Request $request)
    {

        if (TrTraining::where('id', $request['training_id'])->where('trainer_id', $request['id'])->where('status, "zajęty')->exists())
        {
            // Wyślij maila do klienta, że trener odwołał godzinę treningu
        }

        TrTraining::where('id', $request['training_id'])
                    ->where('trainer_id', $request['id'])
                    ->delete();
    }


    protected function orderTraining(Request $request)
    {
        if (TrTraining::where('status', '=', "zajęty")->where('id', '=', $request['training_id'])->exists()) 
        {
            return ('Podany termin jest niedostępny.');
        }
        else
        {
            // Zmienienie statusu z wolny na zajety w tabeli ze wszytskimi terminami trenera
            $training = TrTraining::find($request['training_id']);
            if ($request['status'] == 'wolne') $training-> status = $request['zajęte'];
            $training->save();

            $delete_token = str_random(16);

            // Dodanie rekordu do bazy z zamówionymi treningami
            TrOrderedTrainings::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'training_id' => $request['training_id'],
                'delete_token' => $delete_token,
            ]);

            // Wysłanie maila do klienta


            // Wysłanie maila do trenera


            return redirect('/profile/'.$id);
        }
    }



}