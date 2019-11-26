<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    // ユーザと投稿の一対多の関係を設定する際のDB操作
    public function place()
    {
        return $this->hasMany(Place::class);
    }
    
    // ユーザとお気に入り投稿の多対多の関係を設定する際のDB操作
    public function likes()
    {
        return $this->belongsToMany(Place::class, 'likes', 'user_id', 'place_id')->withTimestamps();
    }
    
    // ユーザが投稿をお気に入りする際のDB操作
    public function like($placeId)
    {
        $exist = $this->is_like($placeId);
        
        if($exit){
            return false;
        } else {
            $this->likes()->attach($placeId);
            return true;
        }
    }
    
    // ユーザが投稿をお気に入り解除する際のDB操作
    public function unlike($placeId)
    {
        $exist = $this->is_like($placeId);
        
        if(exist){
            $this->likes()->detach($placeId);
        } else {
            return false;
        }
    }
    
     //ユーザが投稿を既にお気に入りしているか確認する際のDB操作
     public function is_like($placeId)
     {
         return $this->likes()->where('place_id', $placeId)->exists();
     }
}
