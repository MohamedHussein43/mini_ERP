<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Product extends Model
{
    use HasFactory;
    public function tags(){
        return $this->hasManyThrough(Tag::class, ProductTag::class,'product_id', 'tag_id');
    }
    public function attrByLocale($locale = 'en', $attr = 'name') {
        $arr = json_decode($this->getRawOriginal($attr),true);
        return $arr[$locale];
    }
    public function getNameAttribute($value){
        $arr = json_decode($value, true);
        if (app()->isLocale('ar'))
            return $arr['ar'];
        else
            return $arr['en'];
    }
    public function getDescriptionAttribute($value){
        $arr = json_decode($value, true);
        if (app()->isLocale('ar'))
            return $arr['ar'];
        else
            return $arr['en'];
    }
    public function getPriceAttribute($value){
       return '$' . number_format($value, 2);
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->diffForHumans();
     }

}
