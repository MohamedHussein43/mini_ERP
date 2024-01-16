<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function tags(){
        return $this->hasManyThrough(Tag::class, ProductTag::class,'product_id', 'tag_id');
    }
}
