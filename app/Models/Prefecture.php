<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
/**
   *都道府県に紐づく投稿の取得(spotモデルとのリレーション)
   */
   public function spots()
   {
       return $this->hasMany(spot::class, 'prefecture_id', 'id');
   }
}
