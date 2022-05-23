<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin_notification extends Model
{
    use HasFactory;
    protected $fillable = ["type", "notifiable_id", "data", "read_at"];

    public function admin()
    {
        return $this->belongsTo(Admin::class, "notifiable_id");
    }
}
