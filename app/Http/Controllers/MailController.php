<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller 
{
    
    public $sender_mail = "lookszym@gmail.com";
    public $sender_name = "SPTS";

    public function register_text_email($recipient_mail, $data)
    {
   
        Mail::send(['text'=>'mail'], $data, function($message) 
        {
            $message->to($recipient_mail, 'Tutorials Point')->subject('Laravel Text Testing Mail');
            $message->from($sender_mail, $sender_name);
        });
      
        return ("Basic Email Sent. Check your inbox.");
    }

   public function register_html_email($mail)
   {
        $sender_mail = "lookszym@gmail.com";
        $sender_name = "SPTS";
        
        $data  = array('email' => $mail);

        Mail::send('register_mail', $data, function($message) use ($data, $sender_mail, $sender_name)
        {
            $message->to($data['email'])->subject('Rejestracja w bazie trenerów');
            $message->from($sender_mail, $sender_name);
        });

        return ("HTML Email Sent. Check your inbox.");
   }

   public function calendar_register_client_email($training, Request $request, $delete_token)
   {    
        $data  = array( 'email' => $request['email'],
                        'date'  => $training->date,
                        'begin_time' => $training->begin_time,
                        'end_time' => $training->end_time,
                        'type'  => $training->type,
                        'place' => $training->place,
                        'price' => $training->price,
                        'description' => $training->description,
                        'delete_token' => $delete_token,
                        'training_id' => $training->id,
                        'name' => $request['name'],
                        'surname' => $request['surname'],
                        'phone' => $request['phone'],
                        'comment' => $request['comment']);

        Mail::send('calendar_register_client_mail', $data, function($message) use ($data)
        {
            $message->to($data['email'])->subject('Rejestracja na trening');
        });

        return ("HTML Email Sent. Check your inbox.");
   }

   public function calendar_register_trainer_email($training, Request $request, $trainer_mail)
   {    
        $data  = array( 'trainer_email' => $trainer_mail,
                        'email' => $request['email'],
                        'date'  => $training->date,
                        'begin_time' => $training->begin_time,
                        'end_time' => $training->end_time,
                        'type'  => $training->type,
                        'place' => $training->place,
                        'price' => $training->price,
                        'description' => $training->description,
                        'delete_token' => $training->delete_token,
                        'training_id' => $training->id,
                        'name' => $request['name'],
                        'surname' => $request['surname'],
                        'phone' => $request['phone'],
                        'comment' => $request['comment']);

        Mail::send('calendar_register_trainer_mail', $data, function($message) use ($data)
        {   // Zmienic adresata na trenera
            $message->to($data['trainer_email'])->subject('Rejestracja na trening');
        });

        return ("HTML Email Sent. Check your inbox.");
   }

   public function calendar_resignation_client_email($training, $orderedTraining)
   {    
        $data  = array( 'email' => $orderedTraining->email,
                        'date'  => $training->date,
                        'begin_time' => $training->begin_time,
                        'end_time' => $training->end_time,
                        'type'  => $training->type,
                        'place' => $training->place,
                        'price' => $training->price,
                        'description' => $training->description,
                        'delete_token' => $delete_token,
                        'name' => $orderedTraining->name,
                        'surname' => $orderedTraining->surname,
                        'phone' => $orderedTraining->phone,
                        'comment' => $orderedTraining->comment);

        Mail::send('calendar_resignation_client_mail', $data, function($message) use ($data)
        {
            $message->to($data['email'])->subject('Rejestracja na trening');
        });

        return ("HTML Email Sent. Check your inbox.");
   }

   public function calendar_resignation_trainer_email($training, Request $request)
   {    
    $data  = array( 'email' => $orderedTraining->email,
                    'date'  => $training->date,
                    'begin_time' => $training->begin_time,
                    'end_time' => $training->end_time,
                    'type'  => $training->type,
                    'place' => $training->place,
                    'price' => $training->price,
                    'description' => $training->description,
                    'delete_token' => $delete_token,
                    'name' => $orderedTraining->name,
                    'surname' => $orderedTraining->surname,
                    'phone' => $orderedTraining->phone,
                    'comment' => $orderedTraining->comment);

        Mail::send('calendar_resignation_trainer_mail', $data, function($message) use ($data)
        {     // Zmienic adresata na trenera
            $message->to($data['email'])->subject('Rejestracja na trening');
        });

        return ("HTML Email Sent. Check your inbox.");
   }

   public function attachment_email($recipient_mail,  $data)
   {
        //$data = array('name'=>"SPTS");

        Mail::send('mail', $data, function($message)
        {
            $message->to($recipient_mail, 'Tutorials Point')->subject('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from($sender_mail, $sender_name);
        });

        return ("Email Sent with attachment. Check your inbox.");
   }

}