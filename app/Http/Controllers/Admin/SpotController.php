<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Spot;
use App\Models\Prefecture;

class SpotController extends Controller
{
    //
    public function add()
    {
        //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();
        
        return view('admin.spot.create')
            ->with([
                'prefectures' => $prefectures,
            ]);    
    }
    
    public function create(Request $request)
    {
        //validationを行う
        $this->validate($request, Spot::$rules);
        
        $spot = new Spot;
        $spot->prefecture_id = $request->input('prefecture_id');
        $form = $request->all();
        
        //フォームから画像が送信されてきたら、保存して、$spot->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $spot->image_path = basename($path);
        } else {
            $spot->image_path =null;
        }
        
        //フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する
        unset($form['image']);
        
        //データベースに保存する
        $spot->fill($form);
        $spot->save();
        
        //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();
        
        return redirect('admin/spot/create')
            ->with([
                'prefectures' => $prefectures,
            ]);
    }
}
