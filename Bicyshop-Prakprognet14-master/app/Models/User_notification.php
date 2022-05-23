<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_notification extends Model
{
    use HasFactory;
    protected $fillable = ["type", "notifiable_type", "notifiable_id", "data", "read_at"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
