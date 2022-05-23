<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_review extends Model
{
    use HasFactory;
    protected $fillable = ["product_id", "user_id", "rate", "content"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function response()
    {
        return $this->hasMany(Response::class, "review_id");
    }
}
