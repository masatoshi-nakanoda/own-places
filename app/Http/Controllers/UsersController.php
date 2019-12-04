<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // Userモデルのパスを追加
use App\Place;

class UsersController extends Controller
{
    public function likes($id){
        
        $user = User::find($id);
        $places = $user->likes()->paginate(10);
        
        $data = ['places' => $places,];
    
        
        return view('user.likes', $data);
    }
}
