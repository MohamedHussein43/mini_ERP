<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(product::class, 'product_id');
    }

    public function tag(){
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
