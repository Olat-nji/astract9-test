<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users', [
            'users' => User::where('id', '!=', auth()->user()->id)->where('status', 'Pending')->get()
        ]);
    }


    public function activated()
    {
        return view('users-activated', [
            'users' => User::where('id', '!=', auth()->user()->id)->where('status', 'Active')->get(),
        ]);
    }


    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 'Active';
        $user->save();
        return redirect()->back()->with('success', 'Activated User Successfully!');
    }
}
