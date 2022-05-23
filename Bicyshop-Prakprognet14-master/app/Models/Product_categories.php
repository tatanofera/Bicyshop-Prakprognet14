<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_categories extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["category_name"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function product_category_details()
    {
        return $this->hasMany(Product_category_details::class, "category_id");
    }
}
