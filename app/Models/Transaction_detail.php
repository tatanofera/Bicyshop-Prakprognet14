<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_detail extends Model
{
    use HasFactory;
    protected $fillable = ["transaction_id", "product_id", "qty", "discount", "selling_price"];

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, "transaction_id");
    }
}
