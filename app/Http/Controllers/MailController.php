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