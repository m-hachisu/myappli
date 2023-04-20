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
    
    public function index(Request $request)
    {
        $cond_spot = $request->cond_spot_name;
        if ($cond_spot != '') {
            //検索されたら検索結果を取得する
            $posts = Spot::where('spot', $cond_spot)->get();
        } else {
            //それ以外はすべてのスポットを取得する
            $posts = Spot::all();
        }
        return view('admin.spot.index', ['posts' => $posts, 'cond_spot' => $cond_spot]);
    }
    
    public function edit(Request $request)
    {
        $spot = Spot::find($request->id);
        if(empty($spot)) {
            abort(404);
        }
        
        // 都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();
        
        return view('admin.spot.edit', ['spot_form' => $spot])
            ->with([
                'prefectures' => $prefectures,
                'spot' => $spot,
                ]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Spot::$rules);
        // Spot Modelからデータを取得する
        $spot = Spot::find($request->id);
        // 送信されてきたフォームデータを格納する
        $spot_form = $request->all();
        
        if ($request->remove == 'true') {
            $spot_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $spot_form['image_path'] = basename($path);
        } else {
            $spot_form['image_path'] = $spot->image_path;
        }
        
        unset($spot_form['image']);
        unset($spot_form['remove']);
        unset($spot_form['_token']);
        
        //該当するデータを上書きして保存する
        $spot->fill($spot_form)->save();
        
        return redirect('admin/spot/index');
    }
    
    public function delete(Request $request)
    {
        $spot = Spot::find($request->id);
        
        $spot->delete();
        
        return redirect('admin/spot/index');
    }
}
