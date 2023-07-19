<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','image','body','dimensions'
    ];


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search)  =>
            $query->where(fn($query) =>
                $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('category',fn($query) =>
                    $query->where('name',$search)
                )
        )
        );



    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


}
