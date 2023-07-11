<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;

    public function kids ()
    {
        return Category::get()->where('category_id' ,$this->id);
    }

    public function parentCategory ()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }

}
