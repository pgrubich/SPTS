<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\TrOpinion;
use App\Models\Trainer\Trainer;

class OpinionController extends Controller
{
    protected function create(Request $request)
    {

        $trOpinionSum = TrOpinion::where('trainer_id', '=', $request['trainer_id'])->count();

        if (TrOpinion::where('trainer_id', '=', $request['trainer_id'])
            ->where('email', '=', $request['email'])
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

            $trainer = Trainer::findOrFail($id);
            if ( $trainer->rating == 0) $trainer->rating = $request['rating'];
            else $trainer->rating = ( ($trOpinionSum * $trainer->rating) + $request['rating'] ) / ( $trOpinionSum + 1 );
            $trainer->save();

            return redirect('/profiles/'.$id);
        }

    }

}
