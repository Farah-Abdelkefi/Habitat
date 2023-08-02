<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
