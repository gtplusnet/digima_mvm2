<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use App\Model\TblBusinessContactPersonModel;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email(){
      $data = array('name'=>"Virat Gandhi");
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('guardians35836@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('guardians35836@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function html_email(){
      $data = array('invoice_number'=>"00123452");
      Mail::send('general_admin.pages.invoice', $data, function($message) {
         $message->to('guardians35836@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('guardians35836@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   
   public function attachment_email(){
      $data = array('name'=>"Virat Gandhi");
      $pathfile='images/aboutus_logo.png';
      Mail::send('mail', $data, function($message) use ($pathfile) {
         $message->to('guardians35836@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach(public_path($pathfile));
         // $message->attach('/images/background_home.jpg');
         $message->from('guardians35836@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

}