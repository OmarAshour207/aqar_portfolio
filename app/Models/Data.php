<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Data extends Model
{
    protected $fillable = [
        'image',
        'ar_data',
        'en_data',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getDataImageAttribute()
    {
        return Storage::url('public/data/' . $this->image);
    }
}
