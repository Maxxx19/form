<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    public function index(Request $request)
    {


        return view('form'); //->with('users', $users);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'email' => 'required|regex:/^\S+@\S+\.\S+$/|max:50',
            'password' => 'required|max:50',
            'passwordConfirmation' => 'required|same:password|max:50',
        ]);
        $users = [
            0 =>
            [
                'id' => 1,
                'name' => 'John',
                'email' => 'john@gmail.com'
            ],
            1 =>
            [
                'id' => 2,
                'name' => 'Mike',
                'email' => 'mike@gmail.com'
            ],
            2 =>
            [
                'id' => 3,
                'name' => 'Jak',
                'email' => 'jak@gmail.com'
            ],
        ];
        $email_exists = false;
        foreach($users as $data){
            if($data['email'] == $request->email){
              $email_exists = 'Email already exists!'; 
              Log::info('Email already exists: '.$request->email);
              //dd($email_exists);
              return response()->json(array('success' => false, 'email_exists' => $email_exists));
            }  
        }
        $returnHTML = view('form')
            ->with('status', 'Form Data Has Been inserted')
            ->with('error', $validated)
            ->with('email_exists', $email_exists)
            ->render();

        return response()->json(array('success' => true, 'form' => $returnHTML));
    }
}
