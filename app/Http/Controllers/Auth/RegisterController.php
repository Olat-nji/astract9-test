<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\PasswordRule;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users'
            ],
            'password' => ['required', new PasswordRule],
            'phone' => ['nullable'],
        ]);


        $user = User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'phone' => $credentials['phone'],
            'password' => Hash::make($credentials['password']),
            'status' => 'Pending',
        ]);

        if(auth()->loginUsingId($user->id)){
            
 
            return redirect()->to('/');
        }
    }
}
