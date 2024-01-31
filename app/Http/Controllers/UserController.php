<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'email' => 'required|email',
                'image' => 'image'
            ]);
        } else {
            $validated = request()->validate([
                'fname' => 'required|min:2|max:30',
                'lname' => 'required|min:2|max:30',
                'email' => 'required|email|unique:users,email',
                'image' => 'image'
            ]);
        }

        if(request()->has('image')){
            $imagePath = request()->file('image')->store($user->id.'/profile','public');
            $validated['image'] = $imagePath;

            if($user->image !== null){
                Storage::disk('public')->delete($user->image);
            }

        }


        $user->update($validated);

        return redirect()->route('settings')->with('success',"profile updated successfully.");
    }

}
