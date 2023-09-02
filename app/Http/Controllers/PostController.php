<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Users;
use App\Models\Messages;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function home()
    {
        return Inertia::render('Home');
    }

    public function loginsubmit(Request $request)
    {

    
        $user = Users::where("email", $request->email)->first();

        if (!$user)
        {
           //passwords dont match. send to login page with error message

            return back();

            //return Inertia::location(route('createaccount'));

        }

        if($user->password == $request->password)
        {
            //passwords match, authenticate

            Auth::loginUsingId($user->id, TRUE);

            return Redirect::route('main');
        }

        //else no user - go to create page.
    
        return Inertia::location(route('createaccount'));
        
    }

    public function createaccountsubmit(Request $request)
        {

            $user = Users::where("email", $request->email)->first();

            if($user==null) {

                //email does not exist in DB. Insert into DB

                $user = new Users;
                $user->makeHidden(['created_at', 'updated_at']);
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->save();

                Auth::loginUsingId($user->id, TRUE);

                return Inertia::location(route('main'));

            }

            return to_route('createaccount', ['error_message' => "Email already exists."]);


        }


        public function submitpost(Request $request)
        {

            //get user ID

            $message = new Messages;
            $message->makeHidden(['created_at', 'updated_at']);
            $message->userID = Auth::id();
            $message->message = $request->message;
            
            $message->save();  

            return Redirect::route('main');


        }

        public function deletepost(Request $request)
        {

            //delete post

            $users = Messages::where('mid', $request['mid'])->delete();

            return Redirect::route('main');


        }

}


?>