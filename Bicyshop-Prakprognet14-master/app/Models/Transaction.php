<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ["timeout", "address", "regency", "province", "total", "shipping_cost", "sub_total", "user_id", "courier_id", "proof_of_payment", "status"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function transaction_detail()
    {
        return $this->hasMany(Transaction_detail::class, "transaction_id");
    }

    public function courier()
    {
        return $this->belongsTo(Courier::class, "courier_id");
    }
}
