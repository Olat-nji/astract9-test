<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index',[
            'users'=>User::all()->count(),
            'messages'=>Message::all()->count()
        ]);
    }
}
