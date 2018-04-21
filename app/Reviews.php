<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reviews extends Model
{
    protected $fillable = [
        'customerId', 'orderId', 'content'
    ];
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('orderId', 'DESC');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
