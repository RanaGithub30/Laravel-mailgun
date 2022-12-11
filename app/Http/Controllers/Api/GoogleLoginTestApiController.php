<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class GoogleLoginTestApiController extends Controller
{
    //

    public function check_google_login(Request $request)
    {
            // $validator = Validator::make($request->all(), [
            //     'email' => 'required|email|max:255',
            // ]);

            // $validator = $request->validate([
            //     'email' => 'required|email|max:255',
            // ]);

            // if ($validator->fails())
            // {
            //     return response(['errors'=>$validator->errors()->all()], 422);
            // }

           $user_check = User::whereEmail($request->email)->first();
           

           if($user_check != null){
            // if(Auth::attempt(['Email' => $request->email])) 
            //   {
                dd(Auth::user()->id);
               if($user_check->google_id != null){
                $token = $user_check->createToken('Laravel Token')->accessToken;
                $response = ['token' => $token, 'message'=> 'You are loggedin with google'];
                
               return response()->json($response);
               }
           }else{
            $save_data = User::create([
                'email' => $request->email,
            ]);

            $token = $user_check->createToken('Laravel Token')->accessToken;
            dd($token);
            $response = ['token' => $token, 'message' => 'Successfully Login'];
            
            return response()->json($response);
          // }
        }
    }
}
