<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // fillableの設定
    protected $fillable = [
        'tag',
    ];
    
    // タグと投稿の多対多の関係を設定するDB操作
    public function places()
    {
        return $this->belongsToMany(Place::class, 'places_tags', 'tag_id', 'place_id')->withTimestamps();
    }
}
