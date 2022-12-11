<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserSubscriptioin;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserSubscriptioinController extends Controller
{
    //

    public function user_subscription()
    {
         return view('user.user_subscription');
    }

    public function user_subscription_action(Request $request)
    {

        $random = Str::random(25);
           
        $save_data = UserSubscriptioin::create([
            'email' => $request->email,
            'email_unique_id' => $random,
        ]);

        $request->session()->put('user_ermail', $random);

        $data = [];

        Mail::send('user.mail_content', $data, function($message)
        {
            $message->subject('Mailgun and Laravel are awesome!');
	    	$message->from('rana.saha@weloin.com', 'Weloin Technologies');
            $message->to('ranasaha03edu@gmail.com');
        });


        dd("Success");
    }

    public function user_welcome_email($mail)
    {
           $email = UserSubscriptioin::where('email_unique_id', $mail)->first();
           $mail = $email->email;
           return view('user.mail_confirm', compact('mail'));
    }
}