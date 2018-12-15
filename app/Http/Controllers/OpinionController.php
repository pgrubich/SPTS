<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\TrOpinion;

class OpinionController extends Controller
{
    protected function create(Request $request)
    {

        if (TrOpinion::where('email', '=', $request['email'])
            ->where('trainer_id', '=', $request['trainer_id'])
            ->exists()) 
        {
            return ('Nie można dodać opinii.');
        }
        else
        {
            TrOpinion::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'rating' => $request['rating'],
                'description' => $request['description'],
                'trainer_id' => $request['trainer_id'],
            ]);

            $id = $request['trainer_id'];
            return redirect('/profiles/'.$id);
        }

    }

}
