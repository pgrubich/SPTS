<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\TrOpinion;

class OpinionController extends Controller
{
    protected function create(Request $request)
    {

        TrOpinion::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email' => $request['email'],
            'rating' => $request['rating'],
            'description' => $request['description'],
            'trainer_id' => $request['trainer_id'],
        ]);

        $id = $request['trainer_id'];
        return redirect('/profiles/'.$id);
    } 
}
