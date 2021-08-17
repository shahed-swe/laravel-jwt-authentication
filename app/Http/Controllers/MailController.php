<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;



class MailController extends Controller
{
    // control confirmation mail
    public function sendEmail(Request $request){
        $title = 'Thank you for registration';
        $user_details = [
            'name' => $request->get('name'),
            'email'=> $request->get('email')
        ];

        $sendmail = Mail::to($user_details['email'])->send(new SendMail($title, $user_details));
        if(empty($sendmail)){
            return response()->json([
                'message'=>'Mail sent successfully'
            ], 200);
        }else{
            return response()->json([
                'message'=>'Mail sent fail'
            ], 400);
        }
    }
}
