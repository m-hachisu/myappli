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
        // Spot Modelからデータを取得する
        $spot = Spot::find($request->id);
        // 送信されてきたフォームデータを格納する
        $spot_form = $request->all();

         //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();
        
        $posts = Spot::all()->sortByDesc('updated_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('spot.top', ['headline' => $headline, 'posts' => $posts])
            ->with([
                'prefectures' => $prefectures,
                'area_city' => '',
                'season' => '',
                'weather' => '',
                'start_time_zone' => '',
                'end_time_zone' => '',
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
        return view('spot.index', ['posts' => $posts, 'cond_spot' => $cond_spot]);
    }
}
