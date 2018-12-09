<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrDiscipline;
use App\Models\Trainer\TrLocation;
use App\Models\Trainer\TrCertificate;
use App\Models\Trainer\TrUniversity;
use App\Models\Trainer\TrOffer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
            return ('Podane miasto i województwo już znajdują się w profilu.');
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

    protected function updateDisciplines(Request $request)
    {
        $deletedRows = TrDiscipline::where('trainer_id', $request['trainer_id'])->delete();

        $data = $request->except('trainer_id', '_token');
        foreach($data as $discipline_url_name => $value)
        {
            $discipline_url_name = Str::lower($discipline_url_name);
            $discipline_name = str_replace('_', ' ', $discipline_url_name);
            $discipline_name = ucfirst($discipline_name);


            TrDiscipline::create([
                'trainer_id' => $request['trainer_id'],
                'discipline_name' => $discipline_name,
                'discipline_url_name' => $discipline_url_name,
            ]);   
        }

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

    protected function editCourse(Request $request)
    {

        $trCertificate = TrCertificate::find($request['id']);
        if ($request['name_of_institution'] != '')  $trCertificate->name_of_institution = $request['name_of_institution'];
        if ($request['name_of_course'] != '')       $trCertificate->name_of_course = $request['name_of_course'];
        if ($request['begin_date'] != '')           $trCertificate->begin_date = $request['begin_date'];
        if ($request['end_date'] != '')             $trCertificate->end_date = $request['end_date'];
        $trCertificate->save();

        return redirect('/editProfile');

    }


    protected function destroyCourse($id)
    {

        $trCertificate = TrCertificate::find($id);
        $trCertificate->delete();

        return redirect('/editProfile');

    }


    protected function addUni(Request $request)
    {

        if (TrUniversity::where('university', '=', $request['name'])->where('course', '=', $request['course'])->where('degree', '=', $request['degree'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Twoja lista uczelni zawiera podaną placówkę, kierunek oraz stopień.');
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

    protected function editUni(Request $request)
    {

        $trUniversity = TrUniversity::find($request['id']);
        if ($request['university'] != '')   $trUniversity->university = $request['university'];
        if ($request['course'] != '')       $trUniversity->course = $request['course'];
        if ($request['degree'] != '')       $trUniversity->degree = $request['degree'];
        if ($request['begin_date'] != '')   $trUniversity->begin_date = $request['begin_date'];
        if ($request['end_date'] != '')     $trUniversity->end_date = $request['end_date'];
        $trUniversity->save();

        return redirect('/editProfile');

    }


    protected function destroyUni($id)
    {

        $trUniversity = TrUniversity::find($id);
        $trUniversity->delete();

        return redirect('/editProfile');

    }


    protected function addTrainerOffer(Request $request)
    {

        if (TrOffer::where('name', '=', $request['classes_name'])->where('max_no_of_clients', '=', $request['numbers_of_members'])->where('trainer_id', '=', $request['id'])->exists()) 
        {
            return ('Ten typ zajęć już istnieje.');
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

    protected function editTrainerOffer(Request $request)
    {

        $trOffer = TrOffer::find($request['id']);
        if ($request['name'] != '')     $trOffer->name = $request['name'];
        if ($request['price'] != '')    $trOffer->price = $request['price'];
        if ($request['members'] != '')  $trOffer->max_no_of_clients = $request['members'];
        $trOffer->save();

        return redirect('/editProfile');

    }


    protected function destroyOffer($id)
    {

        $trOffer = TrOffer::find($id);
        $trOffer->delete();

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

    protected function updateProfilePicture($id)
    {
        if (TrPhotos::where('id', '=', $id)->exists()) {
            $photoId = TrPhotos::find($id);
            $trainer = Trainer::find(Auth::user()->id);
            $trainer->profile_picture_id = $photoId;
            $trainer->save();
        }
        else {
            return('Nie znaleziono wybranego zdjęcia.');
        }

        return redirect('/editProfile');
    }


}
