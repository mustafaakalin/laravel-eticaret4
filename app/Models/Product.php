<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category_id', 'stock', 'image_url']; // Alanları tanımlayın



    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }


    // İlişkili olduğu Category modeli
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Sepet ile olan ilişkisi
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
