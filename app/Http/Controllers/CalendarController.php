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
        if (TrTraining::where('date', $request['date'])
            ->where('begin_time',$request['begin_time'])
            ->where('trainer_id',Auth::user()->id)
            ->exists())
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
                'place' => $request['place'],
                'client_limit' => $request['client_limit'],
                'actual_client_number' => 0,
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');

        }

    }


    protected function deleteTraining($id)
    {

        $trTraining = TrTraining::findOrFail($id);
        if ($trTraining->status == 'zajete')  return ("Nie można usunąć treningu.");
        else $trTraining->delete();
            
        return redirect('/editProfile');
    }


    protected function orderTraining(Request $request)
    {

        $delete_token = str_random(16);


        if (TrTraining::where('status', '=', "zajęty")
            ->where('id', '=', $request['training_id'])
            ->exists()) 
        {
            return ('Podany termin jest niedostępny.');
        }
        else
        {

            TrOrderedTrainings::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'training_id' => $request['training_id'],
                'delete_token' => $delete_token,
            ]);


            $training = TrTraining::find($request['training_id']);
            $training->actual_client_number = $training->actual_client_number + 1;
            if( $training->client_limit == $training->actual_client_number) $training->status = "zajęte";
            $training->save();


            // Wysłanie maila do klienta
            // Wysłanie maila do trenera


            return redirect('/profile/'.$id);
        }
    }


    protected function deleteOrder($id)
    {

        $orderedTraining = TrOrderedTrainings::findOrFail($id);
        $training_id = $orderedTraining->training_id;
        $orderedTraining->delete();

        $training = TrTraining::find($training_id);
        $training->actual_client_number = $training->actual_client_number - 1;
        if( $training->client_limit > $training->actual_client_number) $training->status = "wolne";
        $training->save();

        // Wysłanie maila do klienta
        // Wysłanie maila do trenera
            
        return redirect('/editProfile');
    }


}