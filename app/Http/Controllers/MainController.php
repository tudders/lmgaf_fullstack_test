<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Users;
use App\Models\Messages;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    public function home()
    {
        return Inertia::render('Home');
    }

    public function login()
    {
        return Inertia::render('Login');
    }

    public function createaccount()
    {
        return Inertia::render('CreateAccount');
    }

    public function main()
    {

        if(auth()->check()) {

            $posts = Messages::orderBy('mid', 'DESC')
            ->join('users', 'users.id', '=', 'messages.userID')->select('messages.*', "users.name")->get();

            return Inertia::render('Main', ['posts' => $posts, "user" => auth()->user()]);

        }

        return Inertia::location(route('login'));
        
    }

    public function logout()
    {

        Auth::logout();

        return Inertia::location(route('home'));
        
    }

}


?>