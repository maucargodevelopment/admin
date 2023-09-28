<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'invoice';
    public $incrementing = false;

    public function order()
    {
        return $this->hasMany(Order::class, 'invoice');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
