<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ["review_id", "admin_id", "content"];

    public function admin()
    {
        return $this->belongsTo(Admin::class, "admin_id");
    }

    public function product_review()
    {
        return $this->belongsTo(Product_review::class, "review_id");
    }
}
