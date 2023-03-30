<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Datebase\Eloquent\Builder;

class Spot extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'spot_name' => 'required',
        'summary' => 'required',
        'prefecture_id' => 'required',
        'area_city' => 'required',
        'target_start_age' => 'required',
        'target_end_age' => 'required',
        'start_time_zone' => 'required',
        'end_time_zone' => 'required',
        'stay_time' => 'required',
        'kinds' => 'required',
        );
    
    protected $fillable = [
        'prefecture_id',
    ];
    
    /**
     * 投稿の都道府県の取得(Prefectureモデルとのリレーション)
     */
    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
