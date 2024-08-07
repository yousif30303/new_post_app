<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user){
        return view('user.posts.index',[
            'user'=> $user
        ]);
    }
}
