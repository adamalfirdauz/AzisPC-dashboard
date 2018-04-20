<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Orders extends Model
{
    protected $fillable = [
        'nama', 'alamat', 'user_id', 'dateIn', 'dateOut', 'tipeKerusakan',
        'keluhan', 'kelengkapan', 'status', 'harga', 'longitude', 'langitude', 'foto',
        'kodeOrder'
    ];

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('dateIn', 'DESC');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
