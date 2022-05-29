<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["product_name", "price", "description", "product_rate", "stock", "weight"];

    public function discount()
    {
        return $this->hasMany(Discount::class, "product_id");
    }

    public function product_image()
    {
        return $this->hasMany(Product_image::class, "product_id");
    }

    // public function product_categories()
    // {
    //     return $this->hasMany(Product_categories::class, "category_id");
    // }

    public function product_category_detail()
    {
        return $this->hasMany(Product_category_details::class, "product_id");
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, "product_id");
    }

    public function product_review()
    {
        return $this->hasMany(Product_review::class, "product_id");
    }

    public function transaction_detail()
    {
        return $this->hasMany(TransactionDetail::class, "product_id");
    }
}
