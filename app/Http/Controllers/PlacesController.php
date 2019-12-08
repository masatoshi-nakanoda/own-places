<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Place;
use App\Tag;
use Storage;
use Image;

class PlacesController extends Controller
{
    public function all(Request $request) // 全投稿タイトル一覧表示
    {
        // 検索するテキスト取得
        $keyword = $request->input('keyword');
        // 検索するテキストが入力されている場合のみ
        if(!empty($keyword)) {
            $places = Place::whereHas('tags', function($query) use ($keyword) {
                $query->where('tag', $keyword);
            })->paginate(10);
        } else{
            $places= Place::paginate(10);
        }
        
        $data=[];
        $data = [ 'places' => $places];
        return view('place', $data);
    }
    
    public function index() // ユーザ投稿タイトル一覧表示
    {
        $data=[];
        if(\Auth::check()){
            $user = \Auth::user();
            $places = $user->places()->orderBy('created_at', 'desc')->paginate(10);
            
            $data=[ 'places' => $places];
        }
        
        return view('home',$data);
    }
    
    public function create() //投稿画面へ
    {
        return view('place.create');
    }
    
    public function store(Request $request) //投稿処理
    {
        $this->validate($request,[
                'title' => 'required|max:191',
                'content' => 'required|max:191',
                'lat' =>'numeric',
                'lng' =>'numeric',
                'image' => 'file|image|mimes:jpeg,png,jpg,gif',
                'tag' => 'required|max:191',
            ]);
            
        // s3アップロード開始
        $image = $request->file('image');
        // $extension = $request->file('image')->getClientOriginalExtension();
        // バケットの`postpictures`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('postpictures', $image, 'public');
        
        // 投稿を保存
       //  $request->user()->places()->create([
        //        'title' => $request->title,
          //      'content' => $request->content,
            // アップロードした画像のフルパスを取得
        //        'picture_path' => $request->picture_path = Storage::disk('s3')->url($path),
          //      'lat' => $request->lat,
            //    'lng' => $request->lng,
        //    ]);
        
        $place = new Place;
        $place->title = $request->title;
        $place->content = $request->content;
        $place->picture_path = $request->picture_path = Storage::disk('s3')->url($path);
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->user_id = $request->user()->id;
        $place->save();
            
        // タグを保存
        $tag_names = explode(',',$request->tag);
        $tag_ids = [];
        foreach ($tag_names as $tag_name) {
            $tag = Tag::firstOrCreate([ // firstOrCreate　なければ登録、既に存在する場合は該当のデータを持ってくる
                'tag' => $tag_name,
            ]);
            $tag_ids[] = $tag->id;
        }
        
        $place->tags()->sync($tag_ids);
        
        return redirect ('/home');
    }
    
    public function show($id) // 投稿詳細ページ
    {
        $place = Place::find($id);
        
        return view('place.place_detail',[
            'place' => $place,
            ]);
    }
    
    public function edit($id) // 投稿編集ページ
    {
        $place = Place::find($id);
        
        return view('place.edit',[
            'place' => $place,
            ]);
    }
    
    public function update(Request $request, $id) // 投稿更新処理
    {
        $this->validate($request,[
                'title' => 'required|max:191',
                'content' => 'required|max:191',
            ]);
        
            $image = $request->file('image');
            $path = Storage::disk('s3')->putFile('postpictures', $image, 'public');
            
        $place = Place::find($id);
        $place->title = $request->title;
        $place->content = $request->content;
        $place->picture_path = $request->picture_path = Storage::disk('s3')->url($path);
        $place->lat = $request->lat;
        $place->lng = $request->lng;
        $place->save();
            
        return redirect ('/home');
    }
    
    public function destroy($id) // 投稿削除
    {
        $place = Place::find($id);
        $place->delete();
        
        return redirect('/home');
    }
}
