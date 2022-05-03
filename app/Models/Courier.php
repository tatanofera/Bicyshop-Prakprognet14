<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["courier"];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, "courier_id");
    }
}
