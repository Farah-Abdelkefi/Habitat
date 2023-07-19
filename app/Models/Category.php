<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;


    protected $fillable = [
        'name'
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search)  =>
        $query->where(fn($query) =>
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('parentCategory',fn($query) =>
                $query->where('name',$search)
                )
        )
        );



    }

    public function kids ()
    {
        return Category::get()->where('category_id' ,$this->id);
    }

    public function parentCategory ()
    {
        return $this->belongsTo(Category::class ,'category_id');
    }

}
