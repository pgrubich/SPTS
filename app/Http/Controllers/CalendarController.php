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

            // Dodanie rekordu do bazy z zamówionymi treningami
            TrOrderedTrainings::create([
                'name' => $request['name'],
                'surname' => $request['surname'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'training_id' => $request['training_id'],
            ]);

            // Wysłanie maila do klienta


            // Wysłanie maila do trenera


            return redirect('/profile/'.$id);
        }
    }



}