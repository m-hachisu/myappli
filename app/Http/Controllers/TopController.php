<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Spot;
use App\Models\Prefecture;

class TopController extends Controller
{
    //
    public function show(Request $request)
    {
        // Validationをかける
        $this->validate($request, Spot::$rules);
        dd('test');
        // Spot Modelからデータを取得する
        $spot = Spot::find($request->id);
        // 送信されてきたフォームデータを格納する
        $spot_form = $request->all();

         //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();

        return view('top')
            ->with([
                'prefectures' => $prefectures,
            ]);
    }
    
    public function search()
    {
        
    }
}
