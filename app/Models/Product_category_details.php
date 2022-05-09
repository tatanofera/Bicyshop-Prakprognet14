<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_category_details extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["product_id", "category_id"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function product_categories()
    {
        return $this->belongsTo(Product_categories::class, "category_id");
    }
}
