<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    // $fillable設定
    protected $fillable = [
        'title', 'content', 'picture_path', 'user_id',
    ];
    
    // ユーザと投稿の一対多の関係を設定
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // ユーザとお気に入り投稿の多対多の関係を設定する際のDB操作
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'place_id', 'user_id')->withTimestamps();
    }
        
}
