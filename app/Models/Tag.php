<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function products(){
        return $this->hasManyThrough(Product::class, ProductTag::class,'tag_id', 'product_id');
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
}
