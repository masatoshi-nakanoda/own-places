<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // Userモデルのパスを追加
use App\Place;

class UsersController extends Controller
{
    public function likes($id)
    {
        
        $user = User::find($id);
        $places = $user->likes()->paginate(10);
        
        $data = ['places' => $places,];
    
        
        return view('user.likes', $data);
    }
    
    public function userdelete($id)
    {
        $user = User::find($id);
        
        return view('user.delete', [
            'user' => $user,
        ]);
    }
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        return redirect('/thankyou');    
    }
}
