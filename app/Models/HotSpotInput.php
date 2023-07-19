<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotSpotInput extends Model
{
    public $timestamps = false;

    public function product(){
        return $this->hasOne(Product::class,'product_id');
    }
}
