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
}
