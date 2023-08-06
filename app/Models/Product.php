<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'title_de',
        'title_en',
        'body',
        'first_price',
        'price',
        'image',
        'brand',
        'guarantee',
        'option',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearched($query)
    {
        $search = request()->query ('search');
        if (!$search){
            return $query;
        }else{
            return $query->where('title_de','LIKE', "%{$search}%");
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id')->where('status','1')->where('child', null);
    }

}
