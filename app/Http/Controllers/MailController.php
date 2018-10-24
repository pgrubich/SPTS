<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller 
{
    
    protected $sender_mail = "mail@mail.com";
    protected $sender_name = "SPTS";

    public function text_email($recipient_mail, $data)
    {
        //$data = array('name'=>"SPTS");
   
        Mail::send(['text'=>'mail'], $data, function($message) 
        {
            $message->to($recipient_mail, 'Tutorials Point')->subject('Laravel Text Testing Mail');
            $message->from($sender_mail, $sender_name);
        });
      
        return ("Basic Email Sent. Check your inbox.");
   }

   public function html_email($recipient_mail, $data)
   {
        //$data = array('name'=>"SPTS");

        Mail::send('mail', $data, function($message) 
        {
            $message->to($recipient_mail, 'Tutorials Point')->subject('Laravel HTML Testing Mail');
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