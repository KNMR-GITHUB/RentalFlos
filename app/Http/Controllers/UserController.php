<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function create_user(){

        request()->validate([
            'fname' => 'required|min:2|max:30',
            'lname' => 'required|min:2|max:30',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8'
        ]);

        User::create([
            'fname' => request()->get('fname'),
            'lname' => request()->get('lname'),
            'email' => request()->get('email'),
            'password' => request()->get('password'),
        ]);

        return redirect()->route('login');
    }

    public function update(User $user){

        if (request('email') === $user->email) {
            $validated = request()->validate([
                'fname' => 'required|min:2|max:30',
                'lname' => 'required|min:2|max:30',
                'email' => 'required|email'
            ]);
        } else {
            $validated = request()->validate([
                'fname' => 'required|min:2|max:30',
                'lname' => 'required|min:2|max:30',
                'email' => 'required|email|unique:users,email',
            ]);
        }

        $user->fname = $validated['fname'];
        $user->lname = $validated['lname'];
        $user->email = $validated['email'];

        $user->save();

        return redirect()->route('settings')->with('success',"profile updated successfully.");
    }
}
