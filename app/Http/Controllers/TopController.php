<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $prefectures = Prefecture::getSelectValue();
        
        $posts = Spot::orderBy('updated_at','desc')->where('kinds',0)->first();
        $eat_spot = Spot::orderBy('updated_at','desc')->where('kinds',2)->first();
       
        return view('spot.top', ['eat_spot' => $eat_spot, 'posts' => $posts])
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
        $query = Spot::query();
        // $requestがprefecture_idだったら
        if (!empty($request->prefecture_id) ) {
            $query->where('prefecture_id', '=', $request->prefecture_id);
        }
        if (!empty($request->area_city) ) {
            $query->where('area_city', 'like', '%'.$request->area_city.'%');
        }
        if (!empty($request->season) ) {
            $query->where('season', '=', $request->season);
        }
        if (Auth::check() && Auth::user()->hasChildren()) {
            $query->where('target_start_age', '<=', Auth::user()->getChildAge());
            $query->where('target_end_age', '>=', Auth::user()->getChildAge());
        }
        $posts = $query->get();
        
         //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::getSelectValue();

        return view('spot.index', ['posts' => $posts])
        ->with([
                'prefectures' => $prefectures,
                'prefecture_id' => $request->prefecture_id,
                'area_city' => '',
                'season' => '',
                'weather' => '',
                'start_time_zone' => '',
                'end_time_zone' => '',
            ]);
    }
    
    public function add(Request $request)
    {
        // Spot Modelからデータを取得する
        $spot = Spot::find($request->id);
        // 送信されてきたフォームデータを格納する
        $spot_form = $request->all();

         //都道府県テーブルの全データを取得する
        $prefectures = Prefecture::all();
        
        return view('spot', ['spot_form' => $spot]);   
    }
}
